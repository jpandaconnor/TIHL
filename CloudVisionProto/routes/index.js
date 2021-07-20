var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/cloudvision', function(req, res, next) {
  return res.send({"Test123": "Test"})
});

module.exports = router;




