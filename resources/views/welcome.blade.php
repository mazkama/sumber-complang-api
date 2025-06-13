<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumber Complang - 420 BLAZEIT</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Comic Neue', cursive;
            overflow: hidden;
            background: linear-gradient(45deg, #ff0000, #00ff00, #0000ff, #ffff00, #ff00ff, #00ffff);
            background-size: 400% 400%;
            animation: rainbowBg 0.5s ease infinite;
        }
        
        @keyframes rainbowBg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .container {
            width: 100vw;
            height: 100vh;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            animation: shake 0.05s infinite;
        }
        
        @keyframes shake {
            0% { transform: translate(3px, 3px) rotate(0deg); }
            10% { transform: translate(-3px, -6px) rotate(-2deg); }
            20% { transform: translate(-6px, 0px) rotate(2deg); }
            30% { transform: translate(6px, 4px) rotate(0deg); }
            40% { transform: translate(3px, -3px) rotate(2deg); }
            50% { transform: translate(-3px, 6px) rotate(-2deg); }
            60% { transform: translate(-6px, 3px) rotate(0deg); }
            70% { transform: translate(6px, 3px) rotate(-2deg); }
            80% { transform: translate(-3px, -3px) rotate(2deg); }
            90% { transform: translate(3px, 6px) rotate(0deg); }
            100% { transform: translate(3px, -6px) rotate(-2deg); }
        }
        
        h1 {
            font-size: 8rem;
            color: #00ff00;
            text-shadow: 0 0 20px #ff0000, 0 0 40px #0000ff, 0 0 60px #ffff00;
            animation: textGlitch 0.2s infinite, bounce 1s infinite, epilepsyTextShadow 0.1s infinite;
            margin-bottom: 2rem;
            transform-origin: center;
        }
        
        @keyframes textGlitch {
            0% { transform: translate(0); }
            20% { transform: translate(-2px, 2px); }
            40% { transform: translate(-2px, -2px); }
            60% { transform: translate(2px, 2px); }
            80% { transform: translate(2px, -2px); }
            100% { transform: translate(0); }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0) scale(1); }
            40% { transform: translateY(-30px) scale(1.2); }
            60% { transform: translateY(-15px) scale(0.8); }
        }
        
        @keyframes epilepsyTextShadow {
            0% { text-shadow: 0 0 20px #ff0000, 0 0 40px #00ff00, 0 0 60px #0000ff; }
            25% { text-shadow: 0 0 40px #ffff00, 0 0 60px #ff00ff, 0 0 80px #00ffff; }
            50% { text-shadow: 0 0 60px #00ff00, 0 0 80px #ff0000, 0 0 100px #0000ff; }
            75% { text-shadow: 0 0 80px #ff00ff, 0 0 100px #00ffff, 0 0 120px #ffff00; }
            100% { text-shadow: 0 0 20px #ff0000, 0 0 40px #00ff00, 0 0 60px #0000ff; }
        }
        
        .subtitle {
            font-size: 3rem;
            color: #ff00ff;
            text-shadow: 0 0 10px #00ffff;
            animation: pulse 0.5s infinite, rotate 2s infinite;
            margin-bottom: 3rem;
        }
        
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.3; }
            100% { opacity: 1; }
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .explosion {
            position: absolute;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, #ff0000, #ffff00, #00ff00);
            border-radius: 50%;
            animation: explode 1s infinite;
        }
        
        @keyframes explode {
            0% { transform: scale(0) rotate(0deg); opacity: 1; }
            50% { transform: scale(2) rotate(180deg); opacity: 0.7; }
            100% { transform: scale(4) rotate(360deg); opacity: 0; }
        }
        
        .floating-element {
            position: absolute;
            font-size: 2rem;
            color: #ffff00;
            animation: float 2s infinite;
            text-shadow: 0 0 10px #ff0000;
        }
        
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
            100% { transform: translateY(0px) rotate(360deg); }
        }
        
        .particle {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #00ff00;
            animation: particle 3s infinite linear;
        }
        
        @keyframes particle {
            0% { transform: translateY(100vh) rotate(0deg); }
            100% { transform: translateY(-100vh) rotate(360deg); }
        }
        
        .message {
            font-size: 2rem;
            color: #ffffff;
            text-align: center;
            text-shadow: 0 0 20px #ff0000;
            animation: blink 0.3s infinite;
            background: rgba(0,0,0,0.5);
            padding: 1rem;
            border-radius: 10px;
            border: 3px solid #00ff00;
        }
        
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        .lag-generator {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
        }
        
        .illuminati {
            position: absolute;
            width: 150px;
            height: 150px;
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Illuminati_triangle_eye.png/256px-Illuminati_triangle_eye.png');
            background-size: contain;
            background-repeat: no-repeat;
            animation: illuminati 3s infinite;
            filter: drop-shadow(0 0 20px #ffff00);
        }
        
        @keyframes illuminati {
            0% { transform: rotate(0deg) scale(1); opacity: 0.7; }
            25% { transform: rotate(90deg) scale(1.2); opacity: 1; }
            50% { transform: rotate(180deg) scale(0.8); opacity: 0.5; }
            75% { transform: rotate(270deg) scale(1.5); opacity: 1; }
            100% { transform: rotate(360deg) scale(1); opacity: 0.7; }
        }
        
        .mlg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 2;
            pointer-events: none;
            mix-blend-mode: lighten;
            opacity: 0.5;
            background: radial-gradient(circle at 50% 50%, #ff0000 0%, #ffff00 25%, #00ff00 50%, #00ffff 75%, #ff00ff 100%);
            animation: mlgColorCycle 2s linear infinite;
        }
        @keyframes mlgColorCycle {
            0% { filter: hue-rotate(0deg) brightness(1.2); }
            25% { filter: hue-rotate(90deg) brightness(1.4); }
            50% { filter: hue-rotate(180deg) brightness(1.2); }
            75% { filter: hue-rotate(270deg) brightness(1.4); }
            100% { filter: hue-rotate(360deg) brightness(1.2); }
        }
        
        .epilepsy-flash {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9999;
            pointer-events: none;
            opacity: 0.25;
            mix-blend-mode: difference;
            background: #fff;
            animation: epilepsyFlash 0.15s infinite;
        }
        @keyframes epilepsyFlash {
            0% { background: #fff; }
            20% { background: #ff00ff; }
            40% { background: #00ffff; }
            60% { background: #ffff00; }
            80% { background: #ff0000; }
            100% { background: #fff; }
        }
        
        .floating-element img {
            animation: mlgImgHue 1s linear infinite;
        }
        @keyframes mlgImgHue {
            0% { filter: hue-rotate(0deg) brightness(1.2) drop-shadow(0 0 10px #fff); }
            25% { filter: hue-rotate(90deg) brightness(1.4) drop-shadow(0 0 20px #ff0); }
            50% { filter: hue-rotate(180deg) brightness(1.2) drop-shadow(0 0 20px #0ff); }
            75% { filter: hue-rotate(270deg) brightness(1.4) drop-shadow(0 0 20px #f0f); }
            100% { filter: hue-rotate(360deg) brightness(1.2) drop-shadow(0 0 10px #fff); }
        }
    </style>
</head>
<body>
    <!-- Hidden audio element for MLG music -->
    <audio id="mlgAudio" preload="auto" loop>
        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="audio/mpeg">
    </audio>
    
    <div class="container">
        <h1>MLG API SERVER</h1>
        <div class="subtitle">420 BLAZEIT NOSCOPE</div>
        <div class="message">
            🔥 THIS IS JUST AN API SERVER 🔥<br>
            💯 NO WEB INTERFACE NEEDED 💯<br>
            🎯 ANDROID PROJECT ONLY 🎯<br>
            🚀 GET REKT SCRUBS 🚀
        </div>
        
        <!-- Floating MLG Elements -->
        <div class="floating-element" style="top: 10%; left: 10%;">🌿</div>
        <div class="floating-element" style="top: 20%; right: 15%; animation-delay: 0.5s;">💀</div>
        <div class="floating-element" style="bottom: 30%; left: 20%; animation-delay: 1s;">🔥</div>
        <div class="floating-element" style="bottom: 10%; right: 10%; animation-delay: 1.5s;">💯</div>
        <div class="floating-element" style="top: 50%; left: 5%; animation-delay: 2s;">🎯</div>
        <div class="floating-element" style="top: 60%; right: 5%; animation-delay: 2.5s;">🚀</div>
        
        <!-- MLG Image Assets -->
        <div class="floating-element" style="top: 5%; left: 40%; width: 80px; animation-delay: 0.7s;"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Deal_With_It_sunglasses.png" style="width:100%" alt="MLG Sunglasses" crossorigin="anonymous"></div>
        <div class="floating-element" style="top: 70%; left: 10%; width: 70px; animation-delay: 1.2s;"><img src="https://static.wikia.nocookie.net/mlg-parody/images/7/7e/Doritos.png" style="width:100%" alt="Doritos" crossorigin="anonymous"></div>
        <div class="floating-element" style="top: 30%; right: 20%; width: 60px; animation-delay: 1.7s;"><img src="https://static.wikia.nocookie.net/mlg-parody/images/2/2b/Mountain_Dew.png" style="width:100%" alt="Mountain Dew" crossorigin="anonymous"></div>
        <div class="floating-element" style="bottom: 15%; left: 60%; width: 120px; animation-delay: 2.2s;"><img src="https://static.wikia.nocookie.net/mlg-parody/images/2/2d/Intervention_sniper.png" style="width:100%" alt="Sniper" crossorigin="anonymous"></div>
        <div class="floating-element" style="top: 80%; right: 40%; width: 60px; animation-delay: 2.7s;"><img src="https://static.wikia.nocookie.net/mlg-parody/images/2/2a/Joint.png" style="width:100%" alt="Joint" crossorigin="anonymous"></div>
        <div class="floating-element" style="top: 40%; left: 80%; width: 90px; animation-delay: 1.9s;"><img src="https://media.giphy.com/media/3o6Zt481isNVuQI1l6/giphy.gif" style="width:100%" alt="MLG Wow Meme"></div>
        
        <!-- Illuminati Eyes -->
        <div class="illuminati" style="top: 15%; left: 20%;"></div>
        <div class="illuminati" style="bottom: 25%; right: 30%; animation-delay: 1s;"></div>
        <div class="illuminati" style="top: 70%; left: 70%; animation-delay: 2s;"></div>
        <div class="illuminati" style="top: 35%; right: 80%; animation-delay: 0.5s;"></div>
    </div>
    
    <div class="mlg-overlay"></div>
    <div class="epilepsy-flash"></div>
    
    <script>
        // Auto-play audio on page load
        document.addEventListener('DOMContentLoaded', function() {
            const audio = document.getElementById('mlgAudio');
            audio.play().catch(e => console.log('Audio autoplay failed:', e));
        });
        
        // Fungsi untuk mengacak warna
        function getRandomColor() {
            return `hsl(${Math.floor(Math.random()*360)}, 100%, 50%)`;
        }
        
        // Generate massive lag
        setInterval(() => {
            // Create explosions
            for(let i = 0; i < 10; i++) {
                const explosion = document.createElement('div');
                explosion.className = 'explosion';
                explosion.style.left = Math.random() * window.innerWidth + 'px';
                explosion.style.top = Math.random() * window.innerHeight + 'px';
                explosion.style.animationDelay = Math.random() * 2 + 's';
                explosion.style.background = `radial-gradient(circle, ${getRandomColor()}, ${getRandomColor()}, ${getRandomColor()})`;
                document.body.appendChild(explosion);
                setTimeout(() => {
                    explosion.remove();
                }, 2000);
            }
            // Create particles
            for(let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * window.innerWidth + 'px';
                particle.style.backgroundColor = getRandomColor();
                particle.style.animationDelay = Math.random() * 3 + 's';
                document.body.appendChild(particle);
                setTimeout(() => {
                    particle.remove();
                }, 3000);
            }
        }, 100);

        // Setiap 100ms, ubah warna semua .explosion dan .particle yang ada
        setInterval(() => {
            document.querySelectorAll('.explosion').forEach(el => {
                el.style.background = `radial-gradient(circle, ${getRandomColor()}, ${getRandomColor()}, ${getRandomColor()})`;
            });
            document.querySelectorAll('.particle').forEach(el => {
                el.style.backgroundColor = getRandomColor();
            });
        }, 100);
        
        // Intensive computation to create lag
        setInterval(() => {
            const lagElements = [];
            for(let i = 0; i < 1000; i++) {
                const element = document.createElement('div');
                element.className = 'lag-generator';
                element.style.transform = `rotate(${Math.random() * 360}deg) scale(${Math.random()})`;
                document.body.appendChild(element);
                lagElements.push(element);
            }
            
            // Complex calculations
            for(let j = 0; j < 10000; j++) {
                Math.sin(Math.random() * Math.PI) * Math.cos(Math.random() * Math.PI);
            }
            
            // Remove lag elements
            setTimeout(() => {
                lagElements.forEach(el => el.remove());
            }, 50);
        }, 10);
        
        // Random DOM manipulation for extra lag
        setInterval(() => {
            const elements = document.querySelectorAll('*');
            elements.forEach(el => {
                if(Math.random() > 0.95) {
                    el.style.filter = `hue-rotate(${Math.random() * 360}deg) saturate(${Math.random() * 200}%)`;
                }
            });
        }, 50);
        
        // Console spam
        setInterval(() => {
            console.log('MLG NOSCOPE 420 BLAZEIT ' + Math.random());
        }, 1);
        
        // Memory leak simulation
        let memoryHog = [];
        setInterval(() => {
            for(let i = 0; i < 1000; i++) {
                memoryHog.push(new Array(1000).fill(Math.random()));
            }
            if(memoryHog.length > 100000) {
                memoryHog = memoryHog.slice(-50000);
            }
        }, 100);
        
        // Membuat semua .floating-element img selalu berubah warna secara acak
        setInterval(() => {
            document.querySelectorAll('.floating-element img').forEach(img => {
                img.style.filter = `hue-rotate(${Math.floor(Math.random()*360)}deg) brightness(${1+Math.random()*0.5}) drop-shadow(0 0 10px ${getRandomColor()})`;
            });
        }, 100);
    </script>
    
    <!-- Embed YouTube video with autoplay (starts at 1:02) -->
    <iframe style="position: absolute; top: -1000px; left: -1000px; width: 1px; height: 1px;" 
            src="https://www.youtube.com/embed/wpkeZ2kwpkM?autoplay=1&start=62&loop=1&controls=0" 
            allow="autoplay"></iframe>
</body>
</html>