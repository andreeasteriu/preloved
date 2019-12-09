
var events = require('events'),
	colors = require('colors');

	
var lineBreak = '\n- - - - - - - - - - - - - - - -';

var gitwin = function(){
	events.EventEmitter.call(this);
	this.path = process.cwd();
	this.verbose	= true;
	}

gitwin.prototype.__proto__ = events.EventEmitter.prototype;

gitwin.prototype.buildCommand = function(cmd) {
		return 'cd '.concat(this.path,' & git ',cmd);
	}
	
gitwin.prototype.execute = function (cmd) {
	var self = this;
	var childProcess = require('child_process'), ls;
	ls = childProcess.exec(cmd, function (error, stdout, stderr) {
		var msg = '';
		if (error) {
			msg = ('\nstack...\n' + error.stack).grey+('\n failed - errors'.white.redBG);
			self.emit('error',error.code,msg);
			return;
		}
		else{
			msg = stdout.grey+('\n finished - no errors'.white.greenBG);
			self.emit('done',null,msg);
		}
	});
}

gitwin.prototype.emitStatusStart = function(action){
	var startingMsg = (action+' starting').cyan;
	this.emit('status',null,startingMsg);
}	

gitwin.prototype.pull = function() {
		this.emitStatusStart('git pull');
		var cmd = this.buildCommand('pull');
		return this.execute(cmd);
	}

gitwin.prototype.status = function() {
		this.emitStatusStart('git status');
		var cmd = this.buildCommand('status');
		return this.execute(cmd);
	}

gitwin.prototype.log = function (error, stdout, stderr) {
		var msg = 'git status: '.concat(stdout);
		if (error != null) {
			msg = msg.concat('\nERROR: unable to process ',error,' /n FULL ERROR: ',stderr);
		}
		console.log(msg);
	};

String.prototype.endsWith = function(suffix) {
    return this.indexOf(suffix, this.length - suffix.length) !== -1;
};

gitwin.prototype.help = function(){
	console.log('\n*****************');
	console.log('git win - help');
	console.log('*****************');
	var events = ['pull','status','log'];
	var msg = ('available events:');
	events.forEach(
		function(name){ 
			if(msg.endsWith(':')){
				msg+=' '; }	
			else	{ 
				msg+=', '} 
			msg+=name.cyanBG;
		});
	console.log(msg);
	console.log('\n   event example usage (log): '.grey+'\n     "gitwin_instance.on(\'log\',function(error,msg){console.log(msg);});"'.cyan);
}


module.exports = function(callback){
	var _gitwin = new gitwin(callback);
	_gitwin.on('status',function(err,results){ 
		if(this.showHelp) return; 
		if(err){ console.log(err.redBG);}; 
			console.log(results);}
		);
	_gitwin.on('error',function(err,results){ console.log('error'.red); if(err){ console.log(err.redBG);}; console.log(results.red);});
	_gitwin.on('done',function(err,results){ 
		console.log(results); 
		console.log('done'.cyan);
		console.log(lineBreak);
		if(typeof callback == 'function') callback();
		}
	);
	return _gitwin;
};
