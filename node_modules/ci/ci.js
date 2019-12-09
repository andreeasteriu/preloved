	var queue = require('./queue'),
		msbuild = require('msbuild'),
		gitwin = require('gitwin');
	
var ci = function(verbose){
	var verbose = true;
	
	this.next = function(task){
		queue.add(task);
	}
	
	this.start = function(){
		queue.process();
	}
	
	this.init = function(config){
		var verbose = false;
		if(config){
			if(config.verbose === false) {
				verbose = false;
			}
			else{
				verbose = true;
			}
		}
		else{
			console.log('');
			console.log('error: configuration missing');
			console.log('example');
			var exampleConfig =  { 
        configuration:     'your_app_configuration',
        publishProfile:    'your_app_publish_profile',
        sourcePath:        'c:/your_app_path/your_app.sln',
        watchPath :          'c:/your_app_path'
			};
			console.log(JSON.stringify(exampleConfig));
			console.log('');
		}
		
		var _write = function(action){
			var prefixJson = '\n          ';
			console.log('  '+action+'   '+prefixJson+'configuration:"'+config.configuration+ '",'+prefixJson+'publishProfile:"' +config.publishProfile+'",'+prefixJson+'sourcePath:"'+config.sourcePath+'"'+prefixJson+'');
		}
		
		var _publish = function(callback){ 
			_write('publish');
			var _msbuild = new msbuild(callback);
			_msbuild.setConfig(config);		
			_msbuild.verbose = verbose;
			_msbuild.publish();
		 };
		var _build = function(callback){
			_write('build');
			var _msbuild = new msbuild(callback);
			_msbuild.setConfig(config);		
			_msbuild.verbose = verbose;
			_msbuild.build();
		 };
		var _pull =  function(callback){
			_write('pull');
			var _gitwin = new gitwin(callback);
			_gitwin.path = (config.watchPath);
			_gitwin.verbose = verbose;
			_gitwin.pull();
		};
		
		return {build:_build,publish:_publish,pull:_pull};
	};
}

module.exports = new ci();



