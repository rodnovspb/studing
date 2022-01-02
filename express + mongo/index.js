import mongodb from 'mongodb';
let mongoClient = new mongodb.MongoClient('mongodb://localhost:27017/', {
  useUnifiedTopology: true
});

let obj = [
  {
    "name": "cloth1",
    "sizes": [1, 2],
    "colors": ["black", "blue"]
  },
  {
    "name": "cloth2",
    "sizes": [1, 2, 3],
    "colors": ["black", "white"]
  },
  {
    "name": "cloth3",
    "sizes": [2, 3, 4],
    "colors": ["green", "blue"]
  },
  {
    "name": "cloth4",
    "sizes": [4, 5, 6],
    "colors": ["black", "blue", "green"]
  },
];

// node index.js


mongoClient.connect(async function (error, mongo) {

try {
  let coll = mongo.db('test').collection('clothes')
  let res = await coll.find({"sizes": {$elemMatch: {$gt: 2, $lt: 5}}}).toArray()
  console.log(res)
}

catch (e) {
  console.log(e)
}














})