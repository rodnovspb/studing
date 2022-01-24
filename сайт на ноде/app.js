// не забываем открыть терминал в корне этого сайта
import express from 'express'
import mysql from 'mysql'
let app = express()
app.use(express.static('public'))
app.set('view engine', 'pug')
let con = mysql.createConnection({
  host: "localhost",
  user: 'root',
  password: "cined261475288",
  database: "market"
})

app.listen(3000, function () {
})

app.get('/', function (req, res) {
  con.query(
  'SELECT * FROM goods',
  function (error, result) {
    if (error) throw error

    let goods = {}
    for(let i=0; i<result.length; i++){
      goods[result[i]['id']] = result[i]
    }
    console.log(JSON.parse(JSON.stringify(goods)))

    res.render('main', {
      foo: 'qwerty!!!!!!!!',
      bar: 'qweqwr',
      goods: JSON.parse(JSON.stringify(goods))
    })
  }
  )

})


app.get('/cat', function (req, res) {
  let catId = req.query.id //здесь будет запрошенный id категории, переданный через get запрос

// создаем промисы и ждем, когда база вернет данные по такому id
  let cat = new Promise(function (resolve, reject) {
    con.query(
    'SELECT * FROM category WHERE id='+catId,
    function (error, result) {
      if (error) reject(error);
      resolve(result)
    })
  })

  let goods = new Promise(function (resolve, reject) {
    con.query(
    'SELECT * FROM goods WHERE category='+catId,
    function (error, result) {
      if (error) reject(error);
      resolve(result)
    })
  })

  // ждем выполнения всех промисов c помощью Promise.all
  Promise.all([cat, goods]).then(function (value) {
    console.log(value[0])
    res.render("cat", {
      cat: JSON.parse(JSON.stringify(value[0])),
      goods: JSON.parse(JSON.stringify(value[1]))
    })
  })
})

app.get('/goods', function (req, res) {
  con.query(
          "SELECT * FROM goods WHERE id="+req.query.id,
          function (error, result, fields) {
              if(error) throw error;
              res.render('goods', {goods: JSON.parse(JSON.stringify(result))})
          }
  )
})

app.post("/get-category-list", function (req, res){
  // console.log(req.body)
  con.query(
          "SELECT id, category FROM category",
          function (error, result, fields) {
            if(error) throw error;
            console.log(result)
            res.json(result)
          }
  )

})

// http://localhost:3000/goods?id=12  запускать этот адрес