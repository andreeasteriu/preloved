
var queue = function(){
	var keepAlive = false;
	var keepAliveDelay = 5*1000;
	var stack = [];
	
	function _add(task){
		stack.push(task);
	}
	function _clear(){
		stack = [];
	}
	function _next(){
		return stack.shift();
	}
	function async(arg, callback) {
		setTimeout(function(){ arg(callback);},0);
	}
	function _asyncCallback(result) {
		_process();
	}
	function _process(){
		var item = stack.shift();
		if(item)	{
			async( item, _asyncCallback);
		} else {
			if(keepAlive) { 
				_keepAlive();
			} else {
				_final();
			}
		}
	}
	function _final(){
		console.log('queue empty.');
	}
	function _keepAlive(){
		setTimeout(function(){_asyncCallback('waiting');},keepAliveDelay);
	}
	
	return {
		add : _add,
		clear: _clear,
		process: _process
	}
}

module.exports = new queue();