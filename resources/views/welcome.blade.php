<!DOCTYPE html>
<html lang="xx-MLG">
<head>
  <meta charset="ULTIMATE-CODEPAGE">
  <meta name="viewport" content="width=multiverse, initial-scale=9999">
  <title>💸 API MEME GATEWAY 💸</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: repeating-radial-gradient(circle, red, lime, blue, yellow, black);
      color: #fff;
      font-family: 'Comic Sans MS', cursive;
      overflow: hidden;
    }

    .money {
      position: absolute;
      width: 100px;
      animation: fall 5s linear infinite;
      pointer-events: none;
      z-index: 999;
    }

    @keyframes fall {
      0% { top: -150px; transform: rotate(0deg); }
      100% { top: 110%; transform: rotate(720deg); }
    }

    .glitchy-text {
      position: absolute;
      font-size: 4em;
      color: #0ff;
      text-shadow: 2px 2px red, -2px -2px blue;
      animation: shake 0.1s infinite alternate;
    }

    @keyframes shake {
      0% { transform: translate(0, 0); }
      100% { transform: translate(5px, -5px); }
    }

    .spam {
      position: absolute;
      font-size: 2em;
      animation: spinz 2s infinite linear;
    }

    @keyframes spinz {
      0% { transform: rotate(0deg) scale(1); }
      50% { transform: rotate(180deg) scale(3); }
      100% { transform: rotate(360deg) scale(1); }
    }

    .disclaimer {
      position: fixed;
      bottom: 0;
      width: 100%;
      padding: 10px;
      background: black;
      color: yellow;
      font-weight: bold;
      text-align: center;
      z-index: 10000;
    }

    marquee {
      font-size: 3em;
      color: black;
      background: magenta;
      border: 8px dotted lime;
    }
  </style>
</head>
<body>

  <!-- MLG MARQUEE -->
  <marquee scrollamount="70">💥 API MLG ZONE 💥 | 💸💣 DROP ZONE 💣💸 | ☠️ KEKACAUAN MULTIDIMENSI DIMULAI ☠️ | 🚀 BERSIAP UNTUK KELAGAN 🚀</marquee>

  <!-- GLITCH TEXT -->
  <div class="glitchy-text" style="top: 10%; left: 5%;">💀 API = A P I C</div>
  <div class="glitchy-text" style="top: 25%; left: 40%;">🌀 DATA DIPINTA TAPI TAK PERNAH KEMBALI</div>
  <div class="glitchy-text" style="top: 50%; left: 10%;">👽 SERVER BAPER MODE</div>
  <div class="glitchy-text" style="top: 70%; left: 70%;">💿 JSON INI PUNYA ROH</div>
  <div class="glitchy-text" style="top: 85%; left: 25%;">🥵 YOU'VE BEEN API'D</div>

  <!-- IFRAME RICKROLL HIDDEN -->
  <iframe width="0" height="0" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&loop=1&playlist=dQw4w9WgXcQ" allow="autoplay"></iframe>

  <!-- AUDIO GLITCH -->
  <audio autoplay loop>
    <source src="https://www.myinstants.com/media/sounds/mlg-airhorn.mp3" type="audio/mpeg">
  </audio>

  <!-- MONEY RAIN -->
  <script>
    for (let i = 0; i < 150; i++) {
      const money = document.createElement('img');
      money.src = 'https://i.imgur.com/9YjvZbK.png';
      money.classList.add('money');
      money.style.left = Math.random() * 100 + '%';
      money.style.animationDuration = (Math.random() * 2 + 2) + 's';
      document.body.appendChild(money);
    }
  </script>

  <!-- EMOJI ABSURD SPAM -->
  <script>
    const chaos = ['🤑','👻','🐸','👽','💥','🔫','🍕','🚬','🧀','🎮','🦖','📡','🛸','🤯','😈','🤖','⛓️','💣','👾','☢️','🚨','📟','🔥','🚀'];
    for (let i = 0; i < 400; i++) {
      const el = document.createElement('div');
      el.className = 'spam';
      el.innerText = chaos[Math.floor(Math.random() * chaos.length)];
      el.style.top = Math.random() * 100 + '%';
      el.style.left = Math.random() * 100 + '%';
      el.style.color = '#' + Math.floor(Math.random()*16777215).toString(16);
      el.style.fontSize = (Math.random() * 3 + 1) + 'em';
      el.style.animationDuration = (Math.random() * 4 + 1) + 's';
      document.body.appendChild(el);
    }

    // Ledakan emoji tiap detik
    setInterval(() => {
      for (let j = 0; j < 10; j++) {
        const el = document.createElement('div');
        el.className = 'spam';
        el.innerText = '💣';
        el.style.top = Math.random() * 100 + '%';
        el.style.left = Math.random() * 100 + '%';
        el.style.color = 'red';
        el.style.fontSize = '3em';
        el.style.animationDuration = '1s';
        document.body.appendChild(el);
      }
    }, 1000);
  </script>

  <!-- BACKGROUND WARNA BERUBAH -->
  <script>
    setInterval(() => {
      document.body.style.background = `radial-gradient(circle, #${Math.floor(Math.random()*16777215).toString(16)}, #${Math.floor(Math.random()*16777215).toString(16)})`;
    }, 500);
  </script>

  <!-- DISCLAIMER -->
  <div class="disclaimer">
    ⚠️ Website ini hanya perantara API. Tidak untuk digunakan manusia. Jika Anda membaca ini, Anda terlalu dalam. 💻🔥
  </div>

</body>

</html>
