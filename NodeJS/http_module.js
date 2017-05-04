var http = require('http')

http.createServer(function (req, res) {
	res.write('Hello World');
	res.end();
}).listen(8080);

// Add a header
http.createServer(function (req, res) {
	res.writeHead(200, {'Content-Type': 'text/html'});
	res.write('Hello World');
	res.end();
}).listen(8080);

// Reading the query string