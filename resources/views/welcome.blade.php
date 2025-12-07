<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Designed by Omar Al-Hanini</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
  <style>
    body{margin:0;height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);font-family:'Poppins',sans-serif;color:#fff;overflow:hidden;text-align:center}
    h1{font-size:2.5rem;font-weight:700;margin-bottom:20px;animation:fadeInUp 2s ease forwards,glow 2s infinite alternate}
    .btn{display:inline-block;padding:12px 28px;font-size:1rem;font-weight:600;color:#fff;background:linear-gradient(90deg,#00c6ff,#0072ff);border:none;border-radius:30px;cursor:pointer;text-decoration:none;transition:transform .3s,box-shadow .3s;animation:fadeIn 2.5s ease forwards}
    .btn:hover{transform:scale(1.05);box-shadow:0 8px 20px rgba(0,114,255,.5)}
    @keyframes fadeInUp{from{opacity:0;transform:translateY(50px)}to{opacity:1;transform:translateY(0)}}
    @keyframes fadeIn{from{opacity:0}to{opacity:1}}
    @keyframes glow{from{text-shadow:0 0 5px #fff,0 0 10px #00e1ff,0 0 20px #00e1ff}to{text-shadow:0 0 10px #fff,0 0 20px #00c3ff,0 0 30px #00c3ff}}
  </style>
</head>
<body>
  <h1>Developed & Designed by</h1>
  <h1>Omar Al-Hanini & Ahmad Jomhawi</h1>
  <a href="https://sigma-jo.com/" class="btn" target="_blank">اذهب للموقع</a>
</body>
</html>
