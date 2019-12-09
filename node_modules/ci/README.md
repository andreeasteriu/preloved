# ci
Continuous Integration

### example
```
var ci = require('ci');

var app = new ci.init(
	{ 
		configuration: 	'your_app_configuration',
		publishProfile:	'your_app_publish_profile',
		sourcePath:		'c:/your_app_path/your_app.sln',
		watchPath :  		'c:/your_app_path'		
	}
);

ci.next(app.pull);
ci.next(app.build);
ci.next(app.publish);

ci.start();
```
