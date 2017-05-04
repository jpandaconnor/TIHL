var http = require('http');
var fs = require('fs');

// Read files
	// Imagine there is a .html files

http.createServer(function (req, res) {
	fs.readFile('demofile1.html', function(err, data) {
		res.writeHead(200, {'Content-Type': 'text/html'});
		res.write(data);
		res.end();
	})
}).listen(8080);

// Creating files

fs.appendFile('mynewfile1.txt', 'Hello content', function (err) {
	if(err) throw err;
	console.log('Saved');
});

fs.open('mynewfile2.txt', 'w', function(err, file) {
	if(err) throw err;
	console.log('Saved');
});

fs.writeFile('mynewfile3.txt', 'Hllo content', function (err) {
	if(err) thorw err;
	console.log('Saved');
});

// Update Files

fs.appendFile('mynewfile1.txt', 'This is my text.', function (err) {
	if(err) throw err;
	console.log('Updated');
})

fs.writeFile('mynewfile3.txt', 'This is my text', function(err) {
	if(err) throw err;
	console.log('Replaced');
})

// Delete files

fs.unlink('mynewfile2.txt', function (err) {
	if(err) throw err;
	console.log('File deleted');
})