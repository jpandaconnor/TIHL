// Include module

var http = require('http');

http.createServer(function (req, res) {
	res.writeHead(200, {'Content-Type': 'text/html'});
	res.end('Hello world');
}).listen(8080);

// Creating down module

exports.myDateTime = function() {
	return Date();
};

// Including own module

var dt = require('./firstmodule');

http.createServer(function (req, res) {
	res.writeHead(200, {'Content-Type': 'text/html'});
	res.write("The date and time are currently: " + dt.myDateTime());
}).listen(8080);