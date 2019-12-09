var mocha = require('mocha'),
	should = require('should'),
	_gitwin = require('../gitwin');

var gitwin = new _gitwin(function(){});
	
	
describe('commands',function(){

	var path = 'c:/yourapp';
	gitwin.path = path;
	
	/* override for testing */
	gitwin.execute = function (cmd) {
		console.log(cmd);
		return cmd;
	}
	
	describe('pull command',function(){
		gitwin.pull().should.equal('cd c:/yourapp & git pull');
	})
	
	describe('status command',function(){
		gitwin.status().should.equal('cd c:/yourapp & git status');
	})

	describe('build command',function(){
		gitwin.buildCommand('').should.equal('cd c:/yourapp & git ');
	})

})
