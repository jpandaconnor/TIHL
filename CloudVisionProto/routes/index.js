var express = require('express');
var router = express.Router();

const vision = require('@google-cloud/vision');
const client = new vision.ImageAnnotatorClient({
  keyFilename: './creds.json'
});

const fs = require('fs');



const images = new Map([
    // British Gas Bill
    ['1', './images/british-gas-uk-bill-01.jpeg']
]);

/* GET home page. */
router.get('/cloudvision/:id', async function(req, res, next) {
  const id = req.params.id;

  const imagePath = images.get(id);

  try {
    const [result] = await client.textDetection({
      image: {
        source: {
          filename: imagePath
        }
      },
    });

    const labels = result.textAnnotations;


    labels.forEach(label => {
      if(label.description.includes('03 Aug 2018 - 11 Sep 2018')) console.log(label);
    });

    let data = JSON.stringify(result);
    fs.writeFileSync('data.json', data);

  } catch (error) {
    console.log(error);
  }

  return res.send({"Test123": "Test"})
});

module.exports = router;




