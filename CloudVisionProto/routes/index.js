var express = require('express');
var router = express.Router();

const vision = require('@google-cloud/vision');
const client = new vision.ImageAnnotatorClient({
  keyFilename: './creds.json'
});


const images = new Map([
    // British Gas Bill
    ['1', './images/british-gas-uk-bill-01.jpeg']
]);

/* GET home page. */
router.get('/cloudvision/:id', async function(req, res, next) {
  const id = req.params.id;

  const imagePath = images.get(id);

  try {
    const [result] = await client.labelDetection(imagePath);
  } catch (error) {
    console.log(error);
  }

  console.log(id);

  return res.send({"Test123": "Test"})
});

module.exports = router;




