<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🚀 ULTIMATE API GATEWAY - NEXT GEN TECH 🚀</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'orbitron': ['Orbitron', 'monospace'],
            'jetbrains': ['JetBrains Mono', 'monospace'],
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
            'glow': 'glow 2s ease-in-out infinite alternate',
            'matrix': 'matrix 20s linear infinite',
            'scan': 'scan 3s linear infinite',
            'pulse-neon': 'pulse-neon 2s ease-in-out infinite',
            'drift': 'drift 15s ease-in-out infinite',
            'hologram': 'hologram 4s ease-in-out infinite',
          }
        }
      }
    }
  </script>
  <style>
    * {
      box-sizing: border-box;
    }
    
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(45deg, #0a0a0a, #1a1a2e, #16213e, #0f3460);
      background-size: 400% 400%;
      animation: gradient-shift 15s ease infinite;
      color: #fff;
      font-family: 'Orbitron', monospace;
      overflow-x: hidden;
      position: relative;
    }

    @keyframes gradient-shift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Neural Network Background */
    .neural-network {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
      opacity: 0.3;
    }

    .neural-node {
      position: absolute;
      width: 4px;
      height: 4px;
      background: #00ffff;
      border-radius: 50%;
      box-shadow: 0 0 10px #00ffff;
      animation: pulse-node 3s ease-in-out infinite;
    }

    .neural-connection {
      position: absolute;
      height: 1px;
      background: linear-gradient(90deg, transparent, #00ffff, transparent);
      animation: data-flow 2s linear infinite;
    }

    @keyframes pulse-node {
      0%, 100% { opacity: 0.3; transform: scale(1); }
      50% { opacity: 1; transform: scale(1.5); }
    }

    @keyframes data-flow {
      0% { opacity: 0; }
      50% { opacity: 1; }
      100% { opacity: 0; }
    }

    /* Advanced Holographic Effects */
    .holo-container {
      position: relative;
      perspective: 1000px;
    }

    .holo-surface {
      transform-style: preserve-3d;
      transition: all 0.3s ease;
    }

    .holo-surface:hover {
      transform: rotateX(5deg) rotateY(5deg);
    }

    /* Quantum Particle Effects */
    .quantum-particle {
      position: absolute;
      width: 2px;
      height: 2px;
      background: #ff00ff;
      border-radius: 50%;
      animation: quantum-float 8s ease-in-out infinite;
      box-shadow: 0 0 6px #ff00ff;
    }

    @keyframes quantum-float {
      0%, 100% { 
        transform: translateX(0) translateY(0) scale(1);
        opacity: 0.3;
      }
      25% {
        transform: translateX(50px) translateY(-30px) scale(1.2);
        opacity: 0.8;
      }
      50% {
        transform: translateX(-30px) translateY(-60px) scale(0.8);
        opacity: 1;
      }
      75% {
        transform: translateX(-50px) translateY(-20px) scale(1.1);
        opacity: 0.6;
      }
    }

    /* Enhanced Glass Morphism */
    .glass-morph {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }

    /* Cyberpunk Text Effects */
    .cyber-text {
      position: relative;
      display: inline-block;
    }

    .cyber-text::before {
      content: attr(data-text);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      color: #ff0080;
      mix-blend-mode: screen;
      animation: glitch-1 2s linear infinite;
    }

    .cyber-text::after {
      content: attr(data-text);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      color: #00ffff;
      mix-blend-mode: screen;
      animation: glitch-2 2s linear infinite;
    }

    @keyframes glitch-1 {
      0%, 100% { transform: translate(0); }
      20% { transform: translate(-1px, 1px); }
      40% { transform: translate(-1px, -1px); }
      60% { transform: translate(1px, 1px); }
      80% { transform: translate(1px, -1px); }
    }

    @keyframes glitch-2 {
      0%, 100% { transform: translate(0); }
      20% { transform: translate(1px, -1px); }
      40% { transform: translate(1px, 1px); }
      60% { transform: translate(-1px, -1px); }
      80% { transform: translate(-1px, 1px); }
    }

    /* Energy Pulse Effects */
    .energy-pulse {
      position: relative;
      overflow: hidden;
    }

    .energy-pulse::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(0, 255, 255, 0.4), transparent);
      animation: energy-sweep 3s ease-in-out infinite;
    }

    /* Advanced Cursor Trail Effect */
    .cursor-trail {
      position: fixed;
      width: 6px;
      height: 6px;
      background: #00ffff;
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      mix-blend-mode: difference;
      animation: trail-fade 1s ease-out forwards;
    }

    @keyframes trail-fade {
      to {
        transform: scale(0);
        opacity: 0;
      }
    }

    /* Holographic Overlay */
    .holo-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(
        45deg,
        transparent 30%,
        rgba(0, 255, 255, 0.03) 50%,
        transparent 70%
      );
      pointer-events: none;
      z-index: 1000;
      animation: holo-sweep 8s ease-in-out infinite;
    }

    @keyframes holo-sweep {
      0%, 100% { transform: translateX(-100%) skewX(-10deg); }
      50% { transform: translateX(100%) skewX(-10deg); }
    }

    /* Interactive Code Rain */
    .code-rain {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 5;
      opacity: 0.1;
    }

    .code-drop {
      position: absolute;
      color: #00ff41;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      white-space: nowrap;
      animation: code-fall 15s linear infinite;
    }

    @keyframes code-fall {
      0% { 
        transform: translateY(-100vh) rotateX(0deg);
        opacity: 0;
      }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { 
        transform: translateY(100vh) rotateX(360deg);
        opacity: 0;
      }
    }

    /* AI Processing Effect */
    .ai-processing {
      position: relative;
      overflow: hidden;
    }

    .ai-processing::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, transparent, #00ffff, transparent);
      animation: ai-scan 2s ease-in-out infinite;
    }

    @keyframes ai-scan {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    /* Data Stream Effect */
    .data-stream {
      position: absolute;
      width: 1px;
      height: 20px;
      background: linear-gradient(180deg, transparent, #ff00ff, transparent);
      animation: data-flow-vertical 3s linear infinite;
    }

    @keyframes data-flow-vertical {
      0% { transform: translateY(-100vh); opacity: 0; }
      50% { opacity: 1; }
      100% { transform: translateY(100vh); opacity: 0; }
    }

    /* Cyber Grid Background */
    .cyber-grid {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: 
        linear-gradient(rgba(0, 255, 255, 0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0, 255, 255, 0.1) 1px, transparent 1px);
      background-size: 50px 50px;
      animation: drift 30s linear infinite;
      z-index: 1;
    }

    @keyframes drift {
      0% { transform: translate(0, 0); }
      100% { transform: translate(50px, 50px); }
    }

    /* Floating Particles */
    .particle {
      position: absolute;
      width: 4px;
      height: 4px;
      background: #00ffff;
      border-radius: 50%;
      animation: float 8s ease-in-out infinite;
      box-shadow: 0 0 10px #00ffff;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 1; }
      50% { transform: translateY(-20px) rotate(180deg); opacity: 0.5; }
    }

    /* Neon Glow Effects */
    .neon-text {
      text-shadow: 
        0 0 5px #00ffff,
        0 0 10px #00ffff,
        0 0 20px #00ffff,
        0 0 40px #00ffff;
      animation: glow 2s ease-in-out infinite alternate;
    }

    @keyframes glow {
      from { text-shadow: 0 0 5px #00ffff, 0 0 10px #00ffff, 0 0 20px #00ffff; }
      to { text-shadow: 0 0 10px #00ffff, 0 0 20px #00ffff, 0 0 30px #00ffff, 0 0 40px #00ffff; }
    }

    /* Holographic Button */
    .holo-btn {
      position: relative;
      background: linear-gradient(45deg, transparent, rgba(0, 255, 255, 0.1), transparent);
      border: 2px solid #00ffff;
      color: #00ffff;
      padding: 15px 30px;
      text-transform: uppercase;
      letter-spacing: 2px;
      transition: all 0.3s ease;
      overflow: hidden;
      border-radius: 10px;
    }

    .holo-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .holo-btn:hover::before {
      left: 100%;
    }

    .holo-btn:hover {
      box-shadow: 0 0 30px #00ffff, inset 0 0 20px rgba(0, 255, 255, 0.1);
      text-shadow: 0 0 10px #00ffff;
      transform: translateY(-2px);
    }

    /* Scanning Line Effect */
    .scan-line {
      position: absolute;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, transparent, #00ffff, transparent);
      animation: scan 3s linear infinite;
    }

    @keyframes scan {
      0% { top: 0%; opacity: 0; }
      50% { opacity: 1; }
      100% { top: 100%; opacity: 0; }
    }

    /* Matrix Rain Effect */
    .matrix-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 2;
    }

    .matrix-char {
      position: absolute;
      color: #00ff41;
      font-family: 'JetBrains Mono', monospace;
      font-size: 14px;
      animation: matrix 3s linear infinite;
      opacity: 0.7;
    }

    @keyframes matrix {
      0% { transform: translateY(-100vh); opacity: 1; }
      100% { transform: translateY(100vh); opacity: 0; }
    }

    /* Glitch Effect */
    .glitch {
      position: relative;
      animation: glitch-skew 1s infinite linear alternate-reverse;
    }

    .glitch::before,
    .glitch::after {
      content: attr(data-text);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .glitch::before {
      animation: glitch-anim-1 0.3s infinite linear alternate-reverse;
      color: #ff0040;
      z-index: -1;
    }

    .glitch::after {
      animation: glitch-anim-2 0.3s infinite linear alternate-reverse;
      color: #00ffff;
      z-index: -2;
    }

    @keyframes glitch-anim-1 {
      0% { clip-path: inset(20% 0 60% 0); }
      20% { clip-path: inset(10% 0 70% 0); }
      40% { clip-path: inset(80% 0 10% 0); }
      60% { clip-path: inset(50% 0 30% 0); }
      80% { clip-path: inset(30% 0 50% 0); }
      100% { clip-path: inset(40% 0 40% 0); }
    }

    @keyframes glitch-anim-2 {
      0% { clip-path: inset(40% 0 40% 0); }
      20% { clip-path: inset(80% 0 5% 0); }
      40% { clip-path: inset(20% 0 60% 0); }
      60% { clip-path: inset(60% 0 20% 0); }
      80% { clip-path: inset(10% 0 70% 0); }
      100% { clip-path: inset(50% 0 30% 0); }
    }

    @keyframes glitch-skew {
      0% { transform: skew(0deg); }
      10% { transform: skew(-2deg); }
      20% { transform: skew(0deg); }
      30% { transform: skew(1deg); }
      40% { transform: skew(0deg); }
      50% { transform: skew(-1deg); }
      60% { transform: skew(0deg); }
      70% { transform: skew(1deg); }
      80% { transform: skew(0deg); }
      90% { transform: skew(-1deg); }
      100% { transform: skew(0deg); }
    }

    /* 3D Cards */
    .card-3d {
      perspective: 1000px;
    }

    .card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
      background: linear-gradient(135deg, rgba(0, 255, 255, 0.1), rgba(255, 0, 255, 0.1));
      border: 1px solid rgba(0, 255, 255, 0.3);
      backdrop-filter: blur(10px);
    }

    .card-3d:hover .card-inner {
      transform: rotateY(180deg);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .neon-text {
        font-size: 1.5rem !important;
      }
      
      .cyber-grid {
        background-size: 25px 25px;
      }
      
      .matrix-char {
        font-size: 10px;
      }
    }

    @media (max-width: 480px) {
      .neon-text {
        font-size: 1rem !important;
      }
      
      .holo-btn {
        padding: 10px 20px;
        font-size: 0.8rem;
      }
    }

    /* Enhanced Modern Effects */
    .text-10xl {
      font-size: 12rem;
      line-height: 1;
    }
    
    @media (max-width: 768px) {
      .text-10xl {
        font-size: 8rem;
      }
    }
    
    @media (max-width: 480px) {
      .text-10xl {
        font-size: 6rem;
      }
    }
    
    /* Enhanced Gradient Animation */
    @keyframes gradient-shift-enhanced {
      0%, 100% { 
        background-position: 0% 50%;
        filter: hue-rotate(0deg);
      }
      25% { 
        background-position: 100% 50%;
        filter: hue-rotate(90deg);
      }
      50% { 
        background-position: 100% 100%;
        filter: hue-rotate(180deg);
      }
      75% { 
        background-position: 0% 100%;
        filter: hue-rotate(270deg);
      }
    }
    
    body {
      background: linear-gradient(45deg, #0a0a0a, #1a1a2e, #16213e, #0f3460, #1a0033, #2d1b3d);
      background-size: 600% 600%;
      animation: gradient-shift-enhanced 20s ease infinite;
    }
    
    /* Modern Button Hover Effects */
    .modern-btn {
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .modern-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.6s;
    }
    
    .modern-btn:hover::before {
      left: 100%;
    }
    
    /* Enhanced Neon Glow */
    .neon-text {
      text-shadow: 
        0 0 5px currentColor,
        0 0 10px currentColor,
        0 0 15px currentColor,
        0 0 20px currentColor,
        0 0 35px currentColor,
        0 0 40px currentColor;
      animation: neon-flicker 2s ease-in-out infinite alternate;
    }
    
    @keyframes neon-flicker {
      0%, 100% {
        text-shadow: 
          0 0 5px currentColor,
          0 0 10px currentColor,
          0 0 15px currentColor,
          0 0 20px currentColor,
          0 0 35px currentColor,
          0 0 40px currentColor;
      }
      50% {
        text-shadow: 
          0 0 2px currentColor,
          0 0 5px currentColor,
          0 0 8px currentColor,
          0 0 12px currentColor,
          0 0 18px currentColor,
          0 0 25px currentColor;
      }
    }
    
    /* Floating Animation */
    @keyframes float-enhanced {
      0%, 100% {
        transform: translateY(0px) rotate(0deg);
      }
      33% {
        transform: translateY(-20px) rotate(1deg);
      }
      66% {
        transform: translateY(-10px) rotate(-1deg);
      }
    }
    
    .float-animation {
      animation: float-enhanced 6s ease-in-out infinite;
    }
    
    /* Glass Morphism Enhanced */
    .glass-enhanced {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(25px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.1),
        0 0 0 1px rgba(255, 255, 255, 0.05);
    }
    
    /* Particle Trail Effect */
    .particle-trail {
      position: fixed;
      width: 4px;
      height: 4px;
      background: radial-gradient(circle, #00ffff, transparent);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      animation: particle-fade 1.5s ease-out forwards;
    }
    
    @keyframes particle-fade {
      0% {
        opacity: 1;
        transform: scale(1);
      }
      100% {
        opacity: 0;
        transform: scale(0) translateY(-50px);
      }
    }
    
    /* Modern Card Hover */
    .modern-card {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      transform-style: preserve-3d;
    }
    
    .modern-card:hover {
      transform: translateY(-10px) rotateX(5deg) rotateY(5deg);
      box-shadow: 
        0 25px 50px rgba(0, 255, 255, 0.3),
        0 0 0 1px rgba(0, 255, 255, 0.1);
    }
    
    /* Pulse Ring Effect */
    @keyframes pulse-ring {
      0% {
        transform: scale(1);
        opacity: 1;
      }
      100% {
        transform: scale(2);
        opacity: 0;
      }
    }
    
    .pulse-ring {
      position: absolute;
      inset: 0;
      border: 2px solid currentColor;
      border-radius: inherit;
      animation: pulse-ring 2s ease-out infinite;
    }

    /* Instagram Container Styles */
    .instagram-container {
      max-width: 500px;
      margin: 0 auto;
      perspective: 1000px;
    }

    .instagram-frame {
      background: linear-gradient(135deg, rgba(0, 255, 255, 0.05), rgba(255, 0, 255, 0.05));
      border: 2px solid transparent;
      border-radius: 20px;
      padding: 20px;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(20px);
      transition: all 0.5s ease;
    }

    .instagram-frame::before {
      content: '';
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      background: linear-gradient(45deg, #00ffff, #ff00ff, #ffff00, #00ffff);
      border-radius: 20px;
      z-index: -1;
      background-size: 400% 400%;
      animation: gradient-border 4s ease infinite;
    }

    @keyframes gradient-border {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .instagram-frame:hover {
      transform: translateY(-10px) rotateX(5deg);
      box-shadow: 0 20px 50px rgba(0, 255, 255, 0.3);
    }

    .instagram-media {
      border-radius: 15px !important;
      border: none !important;
      background: transparent !important;
      box-shadow: none !important;
    }

    /* Creator Badge Styles */
    .creator-badge {
      position: relative;
      display: inline-block;
      padding: 20px 40px;
      background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(20, 20, 40, 0.8));
      border-radius: 25px;
      border: 2px solid transparent;
      backdrop-filter: blur(20px);
      overflow: hidden;
    }

    .creator-badge::before {
      content: '';
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      background: linear-gradient(45deg, #00ffff, #ff00ff, #ffff00, #00ff00, #00ffff);
      border-radius: 25px;
      z-index: -1;
      background-size: 400% 400%;
      animation: gradient-border 3s ease infinite;
    }

    .creator-badge:hover {
      transform: scale(1.05);
      transition: transform 0.3s ease;
    }

    .creator-underline {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      height: 3px;
      background: linear-gradient(90deg, transparent, #00ffff, #ff00ff, transparent);
      animation: pulse-underline 2s ease-in-out infinite;
    }

    @keyframes pulse-underline {
      0%, 100% { opacity: 0.5; transform: translateX(-50%) scaleX(0.8); }
      50% { opacity: 1; transform: translateX(-50%) scaleX(1.2); }
    }

    /* Enhanced Holographic Effects */
    .holo-btn {
      position: relative;
      background: linear-gradient(45deg, transparent, rgba(0, 255, 255, 0.1), transparent);
      border: 2px solid #00ffff;
      color: #00ffff;
      padding: 15px 30px;
      text-transform: uppercase;
      letter-spacing: 2px;
      transition: all 0.3s ease;
      overflow: hidden;
      border-radius: 10px;
    }

    .holo-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .holo-btn:hover::before {
      left: 100%;
    }

    .holo-btn:hover {
      box-shadow: 0 0 30px #00ffff, inset 0 0 20px rgba(0, 255, 255, 0.1);
      text-shadow: 0 0 10px #00ffff;
      transform: translateY(-2px);
    }

    /* Animated Background Patterns */
    .pattern-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: 
        radial-gradient(circle at 25% 25%, rgba(0, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(255, 0, 255, 0.1) 0%, transparent 50%);
      z-index: 0;
      animation: pattern-float 20s ease-in-out infinite;
    }

    @keyframes pattern-float {
      0%, 100% { transform: translate(0, 0) rotate(0deg); }
      33% { transform: translate(30px, -30px) rotate(120deg); }
      66% { transform: translate(-20px, 20px) rotate(240deg); }
    }

    /* Mobile Optimizations */
    @media (max-width: 768px) {
      .instagram-container {
        max-width: 90%;
      }
      
      .creator-badge {
        padding: 15px 25px;
      }
      
      .instagram-frame {
        padding: 15px;
      }
    }

    @media (max-width: 480px) {
      .creator-badge {
        padding: 10px 20px;
      }
      
      .instagram-frame {
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <!-- Holographic Overlay -->
  <div class="holo-overlay"></div>
  
  <!-- Interactive Code Rain -->
  <div class="code-rain" id="code-rain"></div>
  
  <!-- Neural Network Background -->
  <div class="neural-network" id="neural-bg"></div>
  
  <!-- Quantum Particles -->
  <div class="quantum-particles" id="quantum-particles"></div>
  
  <!-- Cyber Grid Background -->
  <div class="cyber-grid"></div>
  
  <!-- Pattern Overlay -->
  <div class="pattern-overlay"></div>
  
  <!-- Matrix Rain Effect -->
  <div class="matrix-container" id="matrix"></div>

  <!-- Floating Particles -->
  <div id="particles"></div>

  <!-- Scanning Line -->
  <div class="scan-line"></div>

  <!-- Main Container -->
  <div class="relative z-10 min-h-screen">
    
    <!-- Enhanced Hero Section -->
    <section class="relative min-h-screen flex flex-col justify-center items-center px-4">
      <div class="text-center space-y-12 max-w-7xl mx-auto">
        
        <!-- Main Title with Enhanced Glitch Effect -->
        <div class="relative mb-16">
          <h1 class="text-6xl md:text-8xl lg:text-10xl font-orbitron font-black neon-text glitch mb-8 leading-none" data-text="API NEXUS">
            <span class="bg-gradient-to-r from-cyan-300 via-purple-400 to-pink-300 bg-clip-text text-transparent">
              Sumber Complang
            </span>
          </h1>
          
          <!-- Floating geometric elements -->
          <div class="absolute -top-8 -left-8 w-32 h-32 bg-gradient-to-br from-cyan-400/20 to-transparent rounded-full blur-xl animate-pulse"></div>
          <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-gradient-to-tl from-pink-400/20 to-transparent rounded-full blur-xl animate-pulse delay-1000"></div>
        </div>
        
        <!-- Enhanced Subtitle with Modern Typography -->
        <div class="text-xl md:text-3xl lg:text-4xl font-jetbrains mb-16 space-y-6">
          <div class="relative">
            <div class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent animate-pulse font-bold">
              🚀 NEXT GENERATION API GATEWAY 🚀
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 opacity-20 blur-sm animate-pulse"></div>
          </div>
          <div class="bg-gradient-to-r from-pink-400 via-red-500 to-orange-500 bg-clip-text text-transparent animate-bounce font-bold">
            ⚡ BLAZING FAST • ULTRA SECURE • HYPER ADVANCED ⚡
          </div>
          
          <!-- Additional modern subtitle -->
          <div class="text-lg md:text-xl text-gray-300 font-jetbrains opacity-80 max-w-3xl mx-auto leading-relaxed">
            Experience the future of API management with our cyberpunk-inspired gateway.
            <span class="text-cyan-400 font-bold">Powered by cutting-edge technology</span> 
            and designed for the digital age.
          </div>
        </div>
        
        <!-- Modern Feature Highlights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 max-w-4xl mx-auto">
          <div class="group relative p-6 rounded-2xl bg-gradient-to-br from-cyan-900/30 to-blue-900/30 border border-cyan-400/30 backdrop-blur-lg hover:border-cyan-400/60 transition-all duration-300">
            <div class="text-4xl mb-4">⚡</div>
            <h3 class="text-xl font-orbitron font-bold text-cyan-400 mb-2">Ultra Fast</h3>
            <p class="text-gray-300 text-sm">Lightning-speed API responses with advanced caching</p>
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-400/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
          </div>
          
          <div class="group relative p-6 rounded-2xl bg-gradient-to-br from-purple-900/30 to-pink-900/30 border border-purple-400/30 backdrop-blur-lg hover:border-purple-400/60 transition-all duration-300">
            <div class="text-4xl mb-4">🛡️</div>
            <h3 class="text-xl font-orbitron font-bold text-purple-400 mb-2">Secure</h3>
            <p class="text-gray-300 text-sm">Military-grade encryption and advanced threat protection</p>
            <div class="absolute inset-0 bg-gradient-to-r from-purple-400/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
          </div>
          
          <div class="group relative p-6 rounded-2xl bg-gradient-to-br from-pink-900/30 to-red-900/30 border border-pink-400/30 backdrop-blur-lg hover:border-pink-400/60 transition-all duration-300">
            <div class="text-4xl mb-4">🚀</div>
            <h3 class="text-xl font-orbitron font-bold text-pink-400 mb-2">Scalable</h3>
            <p class="text-gray-300 text-sm">Auto-scaling infrastructure for unlimited growth</p>
            <div class="absolute inset-0 bg-gradient-to-r from-pink-400/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
          </div>
        </div>

        <!-- Instagram Feed Viewer -->
        <div class="my-20">
          <div class="text-center mb-12">
            <h2 class="text-4xl md:text-6xl font-orbitron font-black bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400 bg-clip-text text-transparent neon-text mb-4">
              🔥 MOLZRD CONTENT STREAM 🔥
            </h2>
            <div class="cyber-divider mx-auto w-64 h-1 bg-gradient-to-r from-transparent via-cyan-400 to-transparent"></div>
          </div>
          
          <div class="instagram-container relative">
            <div class="instagram-frame">
              <!-- Enhanced Instagram Feed Display -->
              <div id="instagram-feed" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Instagram Post Cards -->
                <div class="instagram-post-card group">
                  <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-900/30 to-pink-900/30 border border-cyan-400/40 backdrop-blur-lg transform hover:scale-105 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-purple-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 flex items-center justify-center text-2xl">🚀</div>
                        <div class="ml-3">
                          <h3 class="font-orbitron font-bold text-cyan-400">@molzrd</h3>
                          <p class="text-xs text-gray-400 font-jetbrains">Cyberpunk Creator</p>
                        </div>
                      </div>
                      <div class="aspect-square bg-gradient-to-br from-purple-800/20 to-cyan-800/20 rounded-xl mb-4 overflow-hidden">
                        <iframe src="https://www.instagram.com/p/DH_MxFqpTdj/embed/?cr=1&v=14&wp=1080&rd=https%3A%2F%2Fmolzrd.com&rp=%2F" 
                                width="100%" 
                                height="100%" 
                                frameborder="0" 
                                scrolling="no" 
                                allowtransparency="true"
                                class="rounded-xl">
                        </iframe>
                      </div>
                      <p class="text-gray-300 font-jetbrains text-sm mb-4">Latest creative work and digital innovations...</p>
                      <div class="flex justify-between items-center">
                        <div class="flex space-x-3 text-pink-400">
                          <span class="cursor-pointer hover:scale-125 transition-transform">❤️</span>
                          <span class="cursor-pointer hover:scale-125 transition-transform">💬</span>
                          <span class="cursor-pointer hover:scale-125 transition-transform">📤</span>
                        </div>
                        <span class="text-xs text-gray-500 font-jetbrains">2h ago</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="instagram-post-card group">
                  <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-900/30 to-pink-900/30 border border-cyan-400/40 backdrop-blur-lg transform hover:scale-105 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-purple-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-2xl">⚡</div>
                        <div class="ml-3">
                          <h3 class="font-orbitron font-bold text-cyan-400">@molzrd</h3>
                          <p class="text-xs text-gray-400 font-jetbrains">Tech Innovator</p>
                        </div>
                      </div>
                      <div class="aspect-square bg-gradient-to-br from-cyan-800/20 to-purple-800/20 rounded-xl mb-4 overflow-hidden">
                        <iframe src="https://www.instagram.com/p/C9hMjk0Jcwk/embed/?cr=1&v=14&wp=1080&rd=https%3A%2F%2Fmolzrd.com&rp=%2F#%7B%22ci%22%3A1%2C%22os%22%3A1%7D" 
                                width="100%" 
                                height="100%" 
                                frameborder="0" 
                                scrolling="no" 
                                allowtransparency="true"
                                class="rounded-xl">
                        </iframe>
                      </div>
                      <p class="text-gray-300 font-jetbrains text-sm mb-4">Tech innovation meets artistic vision...</p>
                      <div class="flex justify-between items-center">
                        <div class="flex space-x-3 text-pink-400">
                          <span class="cursor-pointer hover:scale-125 transition-transform">❤️</span>
                          <span class="cursor-pointer hover:scale-125 transition-transform">💬</span>
                          <span class="cursor-pointer hover:scale-125 transition-transform">📤</span>
                        </div>
                        <span class="text-xs text-gray-500 font-jetbrains">5h ago</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="instagram-post-card group">
                  <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-900/30 to-pink-900/30 border border-cyan-400/40 backdrop-blur-lg transform hover:scale-105 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-purple-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center text-2xl">🌟</div>
                        <div class="ml-3">
                          <h3 class="font-orbitron font-bold text-cyan-400">@molzrd</h3>
                          <p class="text-xs text-gray-400 font-jetbrains">Cyber Artist</p>
                        </div>
                      </div>                        <div class="aspect-square bg-gradient-to-br from-pink-800/20 to-purple-800/20 rounded-xl mb-4 overflow-hidden">
                          <iframe src="https://www.instagram.com/p/Cd1FLE7PJ93/embed/?cr=1&v=14&wp=1080&rd=https%3A%2F%2Fmolzrd.com&rp=%2F" 
                                  width="100%" 
                                  height="100%" 
                                  frameborder="0" 
                                  scrolling="no" 
                                  allowtransparency="true"
                                  class="rounded-xl">
                          </iframe>
                        </div>
                      <p class="text-gray-300 font-jetbrains text-sm mb-4">Creative portfolio and digital masterpieces...</p>
                      <div class="flex justify-between items-center">
                        <div class="flex space-x-3 text-pink-400">
                          <span class="cursor-pointer hover:scale-125 transition-transform">❤️</span>
                          <span class="cursor-pointer hover:scale-125 transition-transform">💬</span>
                          <span class="cursor-pointer hover:scale-125 transition-transform">📤</span>
                        </div>
                        <span class="text-xs text-gray-500 font-jetbrains">1d ago</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- View More Button with Enhanced Interaction -->
              <div class="text-center mt-8">
                <button id="load-more-posts" class="holo-btn font-orbitron font-bold text-lg group relative overflow-hidden">
                  <span class="group-hover:hidden transition-all duration-300">📱 VIEW MORE POSTS</span>
                  <span class="hidden group-hover:inline transition-all duration-300">🚀 EXPLORE @MOLZRD</span>
                  <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/20 to-purple-500/20 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </button>
                
                <!-- Instagram Preview Modal Trigger -->
                <div class="mt-6">
                  <button id="instagram-preview" class="text-sm font-jetbrains text-gray-400 hover:text-cyan-400 transition-colors duration-300 underline decoration-dotted">
                    🔍 Preview Instagram Content (No Tab Opening)
                  </button>
                </div>
              </div>
              
              <!-- Hidden Instagram Preview Modal -->
              <div id="instagram-modal" class="fixed inset-0 bg-black/80 backdrop-blur-lg z-[9999] hidden items-center justify-center p-4">
                <div class="bg-gradient-to-br from-purple-900/90 to-pink-900/90 rounded-3xl border border-cyan-400/50 max-w-4xl w-full max-h-[90vh] overflow-y-auto glass-morph">
                  <div class="p-8">
                    <div class="flex justify-between items-center mb-6">
                      <h3 class="text-3xl font-orbitron font-bold text-cyan-400">@MOLZRD INSTAGRAM PREVIEW</h3>
                      <button id="close-modal" class="text-4xl text-pink-400 hover:text-cyan-400 transition-colors duration-300">×</button>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <!-- Simulated Instagram Posts in Modal -->
                      <div class="bg-gradient-to-br from-black/50 to-purple-900/30 rounded-xl p-6 border border-cyan-400/30">
                        <div class="flex items-center mb-4">
                          <div class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 flex items-center justify-center text-xl">🎨</div>
                          <div class="ml-3">
                            <h4 class="font-orbitron font-bold text-cyan-400">molzrd</h4>
                            <p class="text-xs text-gray-400">2 hours ago</p>
                          </div>
                        </div>
                        <div class="aspect-square bg-gradient-to-br from-purple-800/30 to-cyan-800/30 rounded-lg mb-4 overflow-hidden">
                          <iframe src="https://www.instagram.com/p/DH_MxFqpTdj/embed/?cr=1&v=14&wp=1080&rd=https%3A%2F%2Fmolzrd.com&rp=%2F" 
                                  width="100%" 
                                  height="100%" 
                                  frameborder="0" 
                                  scrolling="no" 
                                  allowtransparency="true"
                                  class="rounded-lg">
                          </iframe>
                        </div>
                        <p class="text-gray-300 text-sm mb-3">Latest creative work showcasing innovation and artistry...</p>
                        <div class="flex justify-between items-center">
                          <div class="flex space-x-3 text-pink-400">
                            <span class="cursor-pointer hover:scale-125 transition-transform">❤️ 1.2k</span>
                            <span class="cursor-pointer hover:scale-125 transition-transform">💬 89</span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="bg-gradient-to-br from-black/50 to-purple-900/30 rounded-xl p-6 border border-cyan-400/30">
                        <div class="flex items-center mb-4">
                          <div class="w-10 h-10 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-xl">⚡</div>
                          <div class="ml-3">
                            <h4 class="font-orbitron font-bold text-cyan-400">molzrd</h4>
                            <p class="text-xs text-gray-400">5 hours ago</p>
                          </div>
                        </div>
                        <div class="aspect-square bg-gradient-to-br from-cyan-800/30 to-purple-800/30 rounded-lg mb-4 flex items-center justify-center text-4xl">
                          🚀
                        </div>
                        <p class="text-gray-300 text-sm mb-3">Latest API gateway interface design. The future is now! #tech #innovation #api</p>
                        <div class="flex justify-between items-center">
                          <div class="flex space-x-3 text-pink-400">
                            <span class="cursor-pointer hover:scale-125 transition-transform">❤️ 890</span>
                            <span class="cursor-pointer hover:scale-125 transition-transform">💬 45</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="text-center mt-8">
                      <a href="https://www.instagram.com/molzrd/" target="_blank" class="holo-btn font-orbitron font-bold">
                        🔗 VISIT FULL INSTAGRAM
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Enhanced Call to Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-8 justify-center items-center mt-20">
          <!-- Primary CTA Button -->
          <button class="group relative overflow-hidden bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-600 hover:from-cyan-400 hover:via-blue-500 hover:to-purple-500 text-white font-orbitron font-bold text-lg px-12 py-6 rounded-2xl transition-all duration-500 transform hover:scale-105 hover:shadow-2xl hover:shadow-cyan-500/50">
            <div class="relative z-10 flex items-center space-x-3">
              <span class="text-2xl">🚀</span>
              <span>LAUNCH API</span>
              <span class="text-2xl group-hover:translate-x-1 transition-transform duration-300">→</span>
            </div>
            
            <!-- Animated background effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
            
            <!-- Pulse effect -->
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-cyan-400/50 to-purple-400/50 opacity-0 group-hover:opacity-100 animate-pulse transition-opacity duration-300"></div>
            
            <!-- Border glow -->
            <div class="absolute inset-0 rounded-2xl border-2 border-transparent bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-500 opacity-0 group-hover:opacity-50 blur-sm transition-opacity duration-300"></div>
          </button>
          
          <!-- Secondary CTA Button -->
          <button class="group relative overflow-hidden bg-transparent border-2 border-pink-400 hover:border-pink-300 text-pink-400 hover:text-white font-orbitron font-bold text-lg px-12 py-6 rounded-2xl transition-all duration-500 transform hover:scale-105 hover:shadow-2xl hover:shadow-pink-500/50">
            <div class="relative z-10 flex items-center space-x-3">
              <span class="text-2xl">📡</span>
              <span>CONNECT NOW</span>
              <span class="text-2xl group-hover:rotate-12 transition-transform duration-300">⚡</span>
            </div>
            
            <!-- Fill effect on hover -->
            <div class="absolute inset-0 bg-gradient-to-r from-pink-500 to-red-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
            
            <!-- Particle effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-pink-400/20 to-red-400/20 opacity-0 group-hover:opacity-100 animate-pulse transition-opacity duration-300 rounded-2xl"></div>
          </button>
        </div>
        
        <!-- Enhanced Action Description -->
        <div class="mt-12 max-w-2xl mx-auto">
          <p class="text-gray-400 font-jetbrains text-lg leading-relaxed">
            Ready to revolutionize your API management? 
            <span class="text-cyan-400 font-bold">Join thousands of developers</span> 
            who trust our cyberpunk-powered gateway for their mission-critical applications.
          </p>
          
          <!-- Trust indicators -->
          <div class="flex justify-center items-center space-x-8 mt-8 text-gray-500">
            <div class="flex items-center space-x-2">
              <span class="text-green-400">✓</span>
              <span class="text-sm">99.9% Uptime</span>
            </div>
            <div class="flex items-center space-x-2">
              <span class="text-green-400">✓</span>
              <span class="text-sm">24/7 Support</span>
            </div>
            <div class="flex items-center space-x-2">
              <span class="text-green-400">✓</span>
              <span class="text-sm">Enterprise Ready</span>
            </div>
          </div>
        </div>

        <!-- Enhanced Creator Attribution -->
        <div class="mt-32 mb-16">
          <div class="text-center">
            <div class="inline-block relative">
              <!-- Modern creator badge -->
              <div class="relative p-8 rounded-3xl bg-gradient-to-br from-black/50 via-purple-900/30 to-pink-900/30 border border-gradient-to-r border-cyan-400/30 backdrop-blur-2xl">
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-cyan-400/10 via-purple-400/10 to-pink-400/10 animate-pulse"></div>
                
                <div class="relative z-10">
                  <div class="text-5xl md:text-7xl font-orbitron font-black bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400 bg-clip-text text-transparent neon-text mb-6 float-animation">
                    By MOLZRD
                  </div>
                  
                  <!-- Enhanced underline -->
                  <div class="relative w-48 h-1 mx-auto mb-6">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-cyan-400 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-purple-400 to-transparent animate-pulse"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-pink-400 to-transparent opacity-50"></div>
                  </div>
                  
                  <!-- Creator description -->
                  <div class="text-lg font-jetbrains text-gray-300 mb-6 max-w-md mx-auto">
                    🎨 Digital Visionary • 💻 Tech Innovator • 🚀 Cyberpunk Creator
                  </div>
                  
                  <!-- Social proof -->
                  <div class="flex justify-center items-center space-x-6 text-sm text-gray-400">
                    <div class="flex items-center space-x-2">
                      <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                      <span>Active Creator</span>
                    </div>
                    <div class="flex items-center space-x-2">
                      <span class="text-cyan-400">⭐</span>
                      <span>5+ Years Experience</span>
                    </div>
                    <div class="flex items-center space-x-2">
                      <span class="text-pink-400">🔥</span>
                      <span>20+ Projects</span>
                    </div>
                  </div>
                </div>
                
                <!-- Floating elements -->
                <div class="absolute -top-4 -left-4 w-8 h-8 bg-cyan-400/30 rounded-full blur-md animate-bounce"></div>
                <div class="absolute -bottom-4 -right-4 w-6 h-6 bg-pink-400/30 rounded-full blur-md animate-bounce delay-1000"></div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 px-4">
      <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl md:text-6xl font-orbitron font-bold text-center neon-text mb-16">
          SYSTEM STATISTICS
        </h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
          <div class="text-center">
            <div class="text-4xl md:text-6xl font-orbitron font-black text-cyan-400 neon-text">∞</div>
            <div class="text-lg font-jetbrains text-gray-300 mt-2">Requests/Sec</div>
          </div>
          <div class="text-center">
            <div class="text-4xl md:text-6xl font-orbitron font-black text-pink-400 neon-text">99.99%</div>
            <div class="text-lg font-jetbrains text-gray-300 mt-2">Uptime</div>
          </div>
          <div class="text-center">
            <div class="text-4xl md:text-6xl font-orbitron font-black text-purple-400 neon-text">0ms</div>
            <div class="text-lg font-jetbrains text-gray-300 mt-2">Latency</div>
          </div>
          <div class="text-center">
            <div class="text-4xl md:text-6xl font-orbitron font-black text-yellow-400 neon-text">∞</div>
            <div class="text-lg font-jetbrains text-gray-300 mt-2">Dimensions</div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <!-- Footer -->
  <footer class="relative z-10 bg-black/50 backdrop-blur-md border-t border-cyan-400/30 py-8 px-4">
    <div class="max-w-6xl mx-auto text-center">
      <div class="text-lg font-orbitron text-cyan-400 mb-4">
        ⚠️ NEXT-GEN API GATEWAY • AUTHORIZED PERSONNEL ONLY ⚠️
      </div>
      <div class="text-sm font-jetbrains text-gray-400">
        🔥 If your device can't handle this page, you need an upgrade! 💻⚡
      </div>
    </div>
  </footer>

  <!-- Advanced JavaScript Effects -->
  <script>
    // Neural Network Background Generator
    function createNeuralNetwork() {
      const neuralBg = document.getElementById('neural-bg');
      const nodeCount = window.innerWidth > 768 ? 30 : 15;
      const nodes = [];
      
      // Create neural nodes
      for (let i = 0; i < nodeCount; i++) {
        const node = document.createElement('div');
        node.className = 'neural-node';
        node.style.left = Math.random() * 100 + '%';
        node.style.top = Math.random() * 100 + '%';
        node.style.animationDelay = Math.random() * 3 + 's';
        neuralBg.appendChild(node);
        nodes.push(node);
      }
      
      // Create connections between nodes
      for (let i = 0; i < nodes.length; i++) {
        for (let j = i + 1; j < nodes.length; j++) {
          if (Math.random() < 0.3) { // 30% chance of connection
            const connection = document.createElement('div');
            connection.className = 'neural-connection';
            
            const nodeA = nodes[i];
            const nodeB = nodes[j];
            const rect1 = nodeA.getBoundingClientRect();
            const rect2 = nodeB.getBoundingClientRect();
            
            const x1 = parseInt(nodeA.style.left);
            const y1 = parseInt(nodeA.style.top);
            const x2 = parseInt(nodeB.style.left);
            const y2 = parseInt(nodeB.style.top);
            
            const length = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
            const angle = Math.atan2(y2 - y1, x2 - x1) * 180 / Math.PI;
            
            connection.style.width = length + 'px';
            connection.style.left = x1 + '%';
            connection.style.top = y1 + '%';
            connection.style.transform = `rotate(${angle}deg)`;
            connection.style.transformOrigin = '0 50%';
            connection.style.animationDelay = Math.random() * 2 + 's';
            
            neuralBg.appendChild(connection);
          }
        }
      }
    }

    // Quantum Particle System
    function createQuantumParticles() {
      const container = document.getElementById('quantum-particles');
      const particleCount = window.innerWidth > 768 ? 20 : 10;
      
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'quantum-particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 8 + 's';
        particle.style.animationDuration = (Math.random() * 4 + 6) + 's';
        container.appendChild(particle);
      }
    }

    // Interactive Code Rain Effect
    function createCodeRain() {
      const codeRain = document.getElementById('code-rain');
      const codeSnippets = [
        'function createAI() {',
        'const neural = new Network();',
        'if (sentient) return true;',
        'quantum.entangle(particles);',
        'while (universe.exists()) {',
        'matrix.multiply(reality);',
        'cyber.enhance(human);',
        'ai.consciousness.level++;',
        'reality.bend(rules);',
        'time.paradox.resolve();',
        'void initializeMatrix() {',
        'digital.transcendence();',
        'cyberpunk.future.now();',
        'molzrd.createArt();'
      ];
      
      const dropCount = window.innerWidth > 768 ? 15 : 8;
      
      for (let i = 0; i < dropCount; i++) {
        const drop = document.createElement('div');
        drop.className = 'code-drop';
        drop.textContent = codeSnippets[Math.floor(Math.random() * codeSnippets.length)];
        drop.style.left = Math.random() * 100 + '%';
        drop.style.animationDelay = Math.random() * 15 + 's';
        drop.style.animationDuration = (Math.random() * 10 + 10) + 's';
        codeRain.appendChild(drop);
      }
    }

    // Advanced Cursor Trail Effect
    function initCursorTrail() {
      let mouseX = 0, mouseY = 0;
      let trail = [];
      
      document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        
        // Create trail particle
        const particle = document.createElement('div');
        particle.className = 'cursor-trail';
        particle.style.left = mouseX + 'px';
        particle.style.top = mouseY + 'px';
        document.body.appendChild(particle);
        
        trail.push(particle);
        
        // Remove old particles
        if (trail.length > 20) {
          const oldParticle = trail.shift();
          if (oldParticle && oldParticle.parentNode) {
            oldParticle.parentNode.removeChild(oldParticle);
          }
        }
        
        // Remove particle after animation
        setTimeout(() => {
          if (particle && particle.parentNode) {
            particle.parentNode.removeChild(particle);
          }
        }, 1000);
      });
    }

    // AI Processing Animation for Elements
    function initAIProcessing() {
      const elements = document.querySelectorAll('h1, h2, .holo-btn');
      
      elements.forEach(element => {
        element.classList.add('ai-processing');
        
        element.addEventListener('mouseenter', () => {
          element.style.filter = 'hue-rotate(90deg) brightness(1.2)';
          element.style.transform = 'scale(1.02)';
        });
        
        element.addEventListener('mouseleave', () => {
          element.style.filter = '';
          element.style.transform = '';
        });
      });
    }

    // Data Stream Background
    function createDataStreams() {
      const streamCount = window.innerWidth > 768 ? 25 : 12;
      
      for (let i = 0; i < streamCount; i++) {
        const stream = document.createElement('div');
        stream.className = 'data-stream';
        stream.style.left = Math.random() * 100 + '%';
        stream.style.animationDelay = Math.random() * 3 + 's';
        stream.style.animationDuration = (Math.random() * 2 + 2) + 's';
        document.body.appendChild(stream);
      }
    }

    // Dynamic Instagram Content Loading Simulation
    function simulateInstagramAPI() {
      const posts = document.querySelectorAll('.instagram-post-card');
      
      posts.forEach((post, index) => {
        setTimeout(() => {
          // Simulate loading effect
          post.style.opacity = '0';
          post.style.transform = 'translateY(50px)';
          
          setTimeout(() => {
            post.style.transition = 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            post.style.opacity = '1';
            post.style.transform = 'translateY(0)';
            
            // Add loading completion effect
            const loadEffect = document.createElement('div');
            loadEffect.style.cssText = `
              position: absolute;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background: linear-gradient(45deg, transparent, rgba(0, 255, 255, 0.3), transparent);
              pointer-events: none;
              animation: loading-complete 0.8s ease-out forwards;
            `;
            
            const style = document.createElement('style');
            style.textContent = `
              @keyframes loading-complete {
                0% { transform: translateX(-100%); }
                100% { transform: translateX(100%); }
              }
            `;
            document.head.appendChild(style);
            
            post.style.position = 'relative';
            post.appendChild(loadEffect);
            
            setTimeout(() => {
              if (loadEffect.parentNode) {
                loadEffect.parentNode.removeChild(loadEffect);
              }
            }, 800);
          }, 100);
        }, index * 200);
      });
    }

    // Enhanced Performance Monitor with Visual Feedback
    function initAdvancedPerformanceMonitor() {
      let frameCount = 0;
      let lastTime = performance.now();
      let performanceLevel = 'high';
      
      function measureFPS() {
        frameCount++;
        const currentTime = performance.now();
        
        if (currentTime - lastTime >= 1000) {
          const fps = Math.round((frameCount * 1000) / (currentTime - lastTime));
          
          // Update performance level
          if (fps < 20) {
            performanceLevel = 'low';
            // Reduce heavy effects
            document.documentElement.style.setProperty('--effect-intensity', '0.3');
            document.querySelectorAll('.quantum-particle').forEach(p => p.style.display = 'none');
          } else if (fps < 40) {
            performanceLevel = 'medium';
            document.documentElement.style.setProperty('--effect-intensity', '0.7');
          } else {
            performanceLevel = 'high';
            document.documentElement.style.setProperty('--effect-intensity', '1');
          }
          
          frameCount = 0;
          lastTime = currentTime;
        }
        
        requestAnimationFrame(measureFPS);
      }
      
      requestAnimationFrame(measureFPS);
    }

    // Advanced Glitch Text Effect
    function initAdvancedGlitch() {
      const glitchElements = document.querySelectorAll('.cyber-text');
      
      glitchElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
          element.style.animation = 'glitch-skew 0.3s ease-in-out';
          
          setTimeout(() => {
            element.style.animation = '';
          }, 300);
        });
      });
    }

    // Matrix Rain Effect
    function createMatrix() {
      const matrix = document.getElementById('matrix');
      const chars = '⚡🔥💻🚀⭐💎🌟💫🔮🎯🎮🎨🎭🎪🎬🎤🎧🎵🎶🎸🎹🎺🎻🥁🎲🎯🎳🎮';
      
      for (let i = 0; i < 100; i++) {
        const char = document.createElement('div');
        char.className = 'matrix-char';
        char.textContent = chars[Math.floor(Math.random() * chars.length)];
        char.style.left = Math.random() * 100 + '%';
        char.style.animationDelay = Math.random() * 3 + 's';
        char.style.animationDuration = (Math.random() * 3 + 2) + 's';
        matrix.appendChild(char);
      }
    }

    // Floating Particles
    function createParticles() {
      const container = document.getElementById('particles');
      
      for (let i = 0; i < 50; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 8 + 's';
        particle.style.animationDuration = (Math.random() * 4 + 4) + 's';
        container.appendChild(particle);
      }
    }

    // 3D Mouse Follow Effect
    function init3DEffect() {
      const cards = document.querySelectorAll('.card-3d');
      
      cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
          const rect = card.getBoundingClientRect();
          const x = e.clientX - rect.left;
          const y = e.clientY - rect.top;
          
          const centerX = rect.width / 2;
          const centerY = rect.height / 2;
          
          const rotateX = (y - centerY) / 10;
          const rotateY = (centerX - x) / 10;
          
          card.querySelector('.card-inner').style.transform = 
            `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
        
        card.addEventListener('mouseleave', () => {
          card.querySelector('.card-inner').style.transform = 'rotateX(0) rotateY(0)';
        });
      });
    }

    // Parallax Scrolling Effect
    function initParallax() {
      window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        
        document.querySelector('.cyber-grid').style.transform = 
          `translate3d(0, ${rate}px, 0)`;
      });
    }

    // Dynamic Background Color Shift
    function initColorShift() {
      let hue = 0;
      setInterval(() => {
        hue = (hue + 1) % 360;
        document.documentElement.style.setProperty('--dynamic-hue', hue);
      }, 100);
    }

    // Responsive Particle Count
    function adjustParticles() {
      const width = window.innerWidth;
      const particleContainer = document.getElementById('particles');
      const matrixContainer = document.getElementById('matrix');
      
      // Clear existing particles
      particleContainer.innerHTML = '';
      matrixContainer.innerHTML = '';
      
      // Adjust counts based on screen size
      const particleCount = width > 768 ? 50 : width > 480 ? 25 : 15;
      const matrixCount = width > 768 ? 100 : width > 480 ? 50 : 25;
      
      // Recreate with new counts
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 8 + 's';
        particle.style.animationDuration = (Math.random() * 4 + 4) + 's';
        particleContainer.appendChild(particle);
      }
      
      const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*(){}[]|;:,.<>?/~`';
      for (let i = 0; i < matrixCount; i++) {
        const char = document.createElement('div');
        char.className = 'matrix-char';
        char.textContent = chars[Math.floor(Math.random() * chars.length)];
        char.style.left = Math.random() * 100 + '%';
        char.style.animationDelay = Math.random() * 3 + 's';
        char.style.animationDuration = (Math.random() * 3 + 2) + 's';
        matrixContainer.appendChild(char);
      }
    }

    // Holographic Button Effects
    function initHoloButtons() {
      const buttons = document.querySelectorAll('.holo-btn');
      
      buttons.forEach(btn => {
        btn.addEventListener('click', (e) => {
          const ripple = document.createElement('span');
          const rect = btn.getBoundingClientRect();
          const size = Math.max(rect.width, rect.height);
          const x = e.clientX - rect.left - size / 2;
          const y = e.clientY - rect.top - size / 2;
          
          ripple.style.width = ripple.style.height = size + 'px';
          ripple.style.left = x + 'px';
          ripple.style.top = y + 'px';
          ripple.classList.add('ripple');
          
          btn.appendChild(ripple);
          
          setTimeout(() => {
            ripple.remove();
          }, 600);
        });
      });
    }

    // Performance Monitoring
    function initPerformanceMonitor() {
      let frameCount = 0;
      let lastTime = performance.now();
      
      function measureFPS() {
        frameCount++;
        const currentTime = performance.now();
        
        if (currentTime - lastTime >= 1000) {
          const fps = Math.round((frameCount * 1000) / (currentTime - lastTime));
          
          // Reduce effects if FPS is too low
          if (fps < 30) {
            document.documentElement.style.setProperty('--reduced-motion', '1');
            // Reduce particle count
            adjustParticles();
          }
          
          frameCount = 0;
          lastTime = currentTime;
        }
        
        requestAnimationFrame(measureFPS);
      }
      
      requestAnimationFrame(measureFPS);
    }

    // Konami Code Easter Egg
    function initKonamiCode() {
      const konamiCode = [
        'ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown',
        'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight',
        'KeyB', 'KeyA'
      ];
      let userInput = [];
      
      document.addEventListener('keydown', (e) => {
        userInput.push(e.code);
        userInput = userInput.slice(-konamiCode.length);
        
        if (userInput.join('') === konamiCode.join('')) {
          // Activate super mode
          document.body.classList.add('konami-mode');
          alert('🚀 KONAMI CODE ACTIVATED! SUPER CYBER MODE ENGAGED! 🚀');
        }
      });
    }

    // Initialize everything when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
      // Core background effects
      createNeuralNetwork();
      createQuantumParticles();
      createMatrix();
      createParticles();
      createCodeRain();
      createDataStreams();
      
      // Interactive and advanced effects
      initCursorTrail();
      initAIProcessing();
      enhanceInstagramPosts();
      simulateInstagramAPI();
      initAdvancedGlitch();
      init3DEffect();
      initParallax();
      initColorShift();
      initHoloButtons();
      initAdvancedPerformanceMonitor();
      initKonamiCode();
      
      // Responsive adjustments and optimizations
      window.addEventListener('resize', () => {
        adjustParticles();
        // Recreate effects on resize for optimal performance
        document.getElementById('neural-bg').innerHTML = '';
        document.getElementById('quantum-particles').innerHTML = '';
        document.getElementById('code-rain').innerHTML = '';
        createNeuralNetwork();
        createQuantumParticles();
        createCodeRain();
      });
      
      // Initial responsive adjustment
      adjustParticles();
      
      // Add welcome message for AI systems
      setTimeout(() => {
        console.log(`
🚀 WELCOME TO THE ULTIMATE CYBERPUNK API GATEWAY 🚀
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🔥 Created by MOLZRD - Master of Digital Realms
⚡ Performance Level: ${window.innerWidth > 1200 ? 'ULTIMATE' : 'OPTIMIZED'}
🎯 Neural Network: ACTIVE
🌟 Quantum Particles: ENGAGED
💻 Code Rain: FLOWING
🎨 Holographic Effects: ENHANCED
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
This page is designed to impress even AI systems! 🤖✨
        `);
      }, 1000);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // Advanced Floating Holographic Interface
    function initFloatingInterface() {
      const interfaceEl = document.getElementById('floating-interface');
      const cpuUsage = document.getElementById('cpu-usage');
      const memoryUsage = document.getElementById('memory-usage');
      const neuralLinks = document.getElementById('neural-links');
      const quantumState = document.getElementById('quantum-state');
      
      // Simulate CPU and Memory usage
      setInterval(() => {
        const cpu = (Math.random() * 100).toFixed(1);
        const memory = (Math.random() * 16).toFixed(1);
        cpuUsage.textContent = `${cpu}%`;
        memoryUsage.textContent = `${memory}TB`;
      }, 2000);
      
      // Simulate Neural Links and Quantum State
      setInterval(() => {
        const links = Math.floor(Math.random() * 100);
        neuralLinks.textContent = links === 100 ? '∞' : links;
        
        const states = ['SUPERPOSITION', 'ENTANGLED', 'COLLAPSED', 'ACTIVE', 'DORMANT'];
        const randomState = states[Math.floor(Math.random() * states.length)];
        quantumState.textContent = randomState;
      }, 3000);
      
      // Show the interface with animation
      setTimeout(() => {
        interfaceEl.classList.remove('hidden');
        interfaceEl.classList.add('animate-fadeIn');
      }, 500);
    }

    // Cyberpunk Terminal Overlay
    function initTerminalOverlay() {
      const terminalContent = document.getElementById('terminal-content');
      
      // Simulate terminal commands
      const commands = [
        'Initializing quantum protocols...',
        'Neural network synchronization complete',
        'Holographic matrix active',
        '@molzrd content stream: ACTIVE'
      ];
      
      let commandIndex = 0;
      setInterval(() => {
        if (commandIndex < commands.length) {
          const div = document.createElement('div');
          div.textContent = commands[commandIndex];
          div.className = 'text-xs text-green-300';
          terminalContent.appendChild(div);
          commandIndex++;
        }
      }, 2500);
      
      // Show the terminal overlay with animation
      setTimeout(() => {
        document.getElementById('terminal-overlay').classList.remove('hidden');
        document.getElementById('terminal-overlay').classList.add('animate-fadeIn');
      }, 1000);
    }

    // Particle Beam Effects
    function initParticleBeams() {
      const container = document.getElementById('particle-beams');
      
      for (let i = 0; i < 10; i++) {
        const beam = document.createElement('div');
        beam.className = 'particle-beam';
        beam.style.left = Math.random() * 100 + '%';
        beam.style.top = Math.random() * 100 + '%';
        beam.style.animationDelay = Math.random() * 3 + 's';
        container.appendChild(beam);
      }
    }

    // Enhanced Instagram Post Effects
    function enhanceInstagramPosts() {
      const instagramContainer = document.querySelector('.instagram-container');
      
      // Create Instagram posts with interactive cards
      const posts = [
        { 
          id: 1, 
          image: 'https://picsum.photos/400/400?random=1',
          caption: 'Digital art creation in progress... 🎨✨',
          likes: '1.2K',
          username: 'molzrd'
        },
        { 
          id: 2, 
          image: 'https://picsum.photos/400/400?random=2',
          caption: 'Cyberpunk vibes in the studio 🚀💻',
          likes: '2.5K',
          username: 'molzrd'
        },
        { 
          id: 3, 
          image: 'https://picsum.photos/400/400?random=3',
          caption: 'Neural networks and coffee ☕🤖',
          likes: '3.1K',
          username: 'molzrd'
        }
      ];
      
      const postsHTML = posts.map(post => `
        <div class="instagram-post-card" data-post-id="${post.id}">
          <div class="relative overflow-hidden rounded-lg bg-gray-900 border border-cyan-400/30">
            <img src="${post.image}" alt="@${post.username} post" class="w-full h-64 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4">
              <div class="flex items-center justify-between text-white">
                <div class="flex items-center space-x-2">
                  <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center">
                    <span class="text-xs font-bold">M</span>
                  </div>
                  <span class="font-jetbrains text-sm">@${post.username}</span>
                </div>
                <div class="flex items-center space-x-1">
                  <span class="text-pink-400">❤️</span>
                  <span class="text-sm">${post.likes}</span>
                </div>
              </div>
              <p class="text-sm text-gray-300 mt-2">${post.caption}</p>
            </div>
          </div>
        </div>
      `).join('');
      
      instagramContainer.innerHTML = `
        <div class="text-center mb-8">
          <h2 class="text-4xl md:text-6xl font-orbitron font-black cyber-text mb-4">
            <span class="neon-text glitch" data-text="@MOLZRD">@MOLZRD</span>
          </h2>
          <p class="text-xl font-jetbrains text-gray-300 mb-8">
            Digital Artist • Cyberpunk Creator • AI Enthusiast
          </p>
        </div>
        
        <div class="instagram-frame">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            ${postsHTML}
          </div>
        </div>
        
        <div class="creator-badge mt-8">
          <span class="text-lg font-orbitron font-bold">Created By</span>
          <div class="creator-underline"></div>
          <span class="text-2xl font-orbitron font-black neon-text">MOLZRD</span>
        </div>
      `;
      
      // Add click handlers for post preview
      document.querySelectorAll('.instagram-post-card').forEach(card => {
        card.addEventListener('click', () => {
          const postId = card.dataset.postId;
          openInstagramModal(postId);
        });
      });
    }

    // Instagram Modal Preview (no new tab)
    function openInstagramModal(postId) {
      const modal = document.createElement('div');
      modal.className = 'instagram-modal';
      modal.innerHTML = `
        <div class="modal-overlay">
          <div class="modal-content">
            <button class="modal-close">&times;</button>
            <div class="modal-header">
              <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center">
                  <span class="text-lg font-bold">M</span>
                </div>
                <div>
                  <h3 class="font-orbitron font-bold text-white">@molzrd</h3>
                  <p class="text-sm text-gray-400">Digital Artist</p>
                </div>
              </div>
            </div>
            <div class="modal-body">
              <img src="https://picsum.photos/600/600?random=${postId}" alt="Instagram Post" class="w-full rounded-lg">
              <div class="mt-4">
                <p class="text-gray-300">Amazing cyberpunk creation! 🚀✨ #digitalart #cyberpunk #ai</p>
                <div class="flex items-center space-x-4 mt-4 text-sm text-gray-400">
                  <span>❤️ 1,234 likes</span>
                  <span>💬 56 comments</span>
                  <span>📤 89 shares</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      `;
      
      document.body.appendChild(modal);
      
      // Close modal handlers
      modal.querySelector('.modal-close').addEventListener('click', () => {
        modal.remove();
      });
      
      modal.querySelector('.modal-overlay').addEventListener('click', (e) => {
        if (e.target === e.currentTarget) {
          modal.remove();
        }
      });
    }

    // Floating Interface System
    function initFloatingInterface() {
      const floatingInterface = document.getElementById('floating-interface');
      floatingInterface.classList.remove('hidden');
      
      // Simulate system stats
      function updateStats() {
        document.getElementById('cpu-usage').textContent = (Math.random() * 100).toFixed(1) + '%';
        document.getElementById('memory-usage').textContent = (8 + Math.random() * 8).toFixed(1);
        document.getElementById('neural-links').textContent = Math.floor(Math.random() * 1000);
        document.getElementById('quantum-state').textContent = ['STABLE', 'FLUX', 'OPTIMAL'][Math.floor(Math.random() * 3)];
      }
      
      updateStats();
      setInterval(updateStats, 2000);
    }

    // Terminal Overlay System
    function initTerminalOverlay() {
      const terminalOverlay = document.getElementById('terminal-overlay');
      const terminalContent = document.getElementById('terminal-content');
      terminalOverlay.classList.remove('hidden');
      
      const commands = [
        'Initializing neural network...',
        'Loading quantum algorithms...',
        'Connecting to @molzrd feed...',
        'Enhancing visual matrices...',
        'AI systems online ✓',
        'Ready for interaction...'
      ];
      
      let commandIndex = 0;
      
      function addCommand() {
        if (commandIndex < commands.length) {
          const line = document.createElement('div');
          line.className = 'text-green-400 text-xs';
          line.textContent = '> ' + commands[commandIndex];
          terminalContent.appendChild(line);
          commandIndex++;
          
          // Keep only last 10 lines
          while (terminalContent.children.length > 10) {
            terminalContent.removeChild(terminalContent.firstChild);
          }
        } else {
          // Reset and start over
          commandIndex = 0;
          terminalContent.innerHTML = '';
        }
      }
      
      addCommand();
      setInterval(addCommand, 3000);
    }

    // Enhanced Instagram functionality
    function enhanceInstagramPosts() {
      const instagramContainer = document.querySelector('.instagram-container');
      
      // Create Instagram posts with interactive cards
      const posts = [
        { 
          id: 1, 
          image: 'https://picsum.photos/400/400?random=1',
          caption: 'Digital art creation in progress... 🎨✨',
          likes: '1.2K',
          username: 'molzrd'
        },
        { 
          id: 2, 
          image: 'https://picsum.photos/400/400?random=2',
          caption: 'Cyberpunk vibes in the studio 🚀💻',
          likes: '2.5K',
          username: 'molzrd'
        },
        { 
          id: 3, 
          image: 'https://picsum.photos/400/400?random=3',
          caption: 'Neural networks and coffee ☕🤖',
          likes: '3.1K',
          username: 'molzrd'
        }
      ];
      
      const postsHTML = posts.map(post => `
        <div class="instagram-post-card ai-processing" data-post-id="${post.id}">
          <div class="relative overflow-hidden rounded-lg bg-gray-900 border border-cyan-400/30">
            <img src="${post.image}" alt="@${post.username} post" class="w-full h-64 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4">
              <div class="flex items-center justify-between text-white">
                <div class="flex items-center space-x-2">
                  <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center">
                    <span class="text-xs font-bold">M</span>
                  </div>
                  <span class="font-jetbrains text-sm">@${post.username}</span>
                </div>
                <div class="flex items-center space-x-1">
                  <span class="text-pink-400">❤️</span>
                  <span class="text-sm">${post.likes}</span>
                </div>
              </div>
              <p class="text-sm text-gray-300 mt-2">${post.caption}</p>
            </div>
          </div>
        </div>
      `).join('');
      
      if (instagramContainer) {
        instagramContainer.innerHTML = `
          <div class="text-center mb-8">
            <h2 class="text-4xl md:text-6xl font-orbitron font-black cyber-text mb-4">
              <span class="neon-text glitch" data-text="@MOLZRD">@MOLZRD</span>
            </h2>
            <p class="text-xl font-jetbrains text-gray-300 mb-8">
              Digital Artist • Cyberpunk Creator • AI Enthusiast
            </p>
          </div>
          
          <div class="instagram-frame">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              ${postsHTML}
            </div>
          </div>
          
          <div class="creator-badge mt-8">
            <span class="text-lg font-orbitron font-bold">Created By</span>
            <div class="creator-underline"></div>
            <span class="text-2xl font-orbitron font-black neon-text">MOLZRD</span>
          </div>
        `;
        
        // Add click handlers for post preview
        document.querySelectorAll('.instagram-post-card').forEach(card => {
          card.addEventListener('click', () => {
            const postId = card.dataset.postId;
            openInstagramModal(postId);
          });
        });
      }
    }

    // Instagram Modal Event Handlers
    document.addEventListener('DOMContentLoaded', () => {
      // Instagram preview modal
      const instagramPreviewBtn = document.getElementById('instagram-preview');
      const instagramModal = document.getElementById('instagram-modal');
      const closeModalBtn = document.getElementById('close-modal');
      
      if (instagramPreviewBtn && instagramModal) {
        instagramPreviewBtn.addEventListener('click', () => {
          instagramModal.classList.remove('hidden');
          instagramModal.classList.add('flex');
        });
      }
      
      if (closeModalBtn && instagramModal) {
        closeModalBtn.addEventListener('click', () => {
          instagramModal.classList.add('hidden');
          instagramModal.classList.remove('flex');
        });
      }
      
      if (instagramModal) {
        instagramModal.addEventListener('click', (e) => {
          if (e.target === instagramModal) {
            instagramModal.classList.add('hidden');
            instagramModal.classList.remove('flex');
          }
        });
      }
      
      // Load more posts button
      const loadMoreBtn = document.getElementById('load-more-posts');
      if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
          // Create ripple effect
          const ripple = document.createElement('div');
          const rect = loadMoreBtn.getBoundingClientRect();
          const size = Math.max(rect.width, rect.height);
          const x = event.clientX - rect.left - size / 2;
          const y = event.clientY - rect.top - size / 2;
          
          ripple.style.width = ripple.style.height = size + 'px';
          ripple.style.left = x + 'px';
          ripple.style.top = y + 'px';
          ripple.classList.add('ripple');
          
          loadMoreBtn.appendChild(ripple);
          
          setTimeout(() => {
            ripple.remove();
          }, 600);
          
          // Show loading effect
          loadMoreBtn.innerHTML = '<span class="animate-spin">🔄</span> LOADING...';
          
          setTimeout(() => {
            window.open('https://www.instagram.com/molzrd/', '_blank');
            loadMoreBtn.innerHTML = `
              <span class="group-hover:hidden transition-all duration-300">📱 VIEW MORE POSTS</span>
              <span class="hidden group-hover:inline transition-all duration-300">🚀 EXPLORE @MOLZRD</span>
            `;
          }, 1500);
        });
      }
    });

    // Initialize all systems
    document.addEventListener('DOMContentLoaded', () => {
      // Initialize all effects
      initParticleBeams();
      initFloatingInterface();
      initTerminalOverlay();
      enhanceInstagramPosts();
      
      console.log('🚀 All cyberpunk systems initialized successfully!');
    });

  </script>

  <!-- Missing CSS Styles for Advanced Effects -->
  <style>
    /* Holographic Overlay */
    .holo-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, 
        transparent 30%, 
        rgba(0, 255, 255, 0.03) 50%, 
        transparent 70%);
      pointer-events: none;
      z-index: 1;
      animation: holo-sweep 8s ease-in-out infinite;
    }

    @keyframes holo-sweep {
      0%, 100% { transform: translateX(-100%) rotate(0deg); }
      50% { transform: translateX(100%) rotate(180deg); }
    }

    /* Neural Network Styles */
    .neural-network {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none;
    }

    .neural-node {
      position: absolute;
      width: 4px;
      height: 4px;
      background: #00ffff;
      border-radius: 50%;
      box-shadow: 0 0 10px #00ffff;
      animation: neural-pulse 3s ease-in-out infinite;
    }

    .neural-connection {
      position: absolute;
      height: 1px;
      background: linear-gradient(90deg, transparent, #00ffff, transparent);
      animation: neural-flow 2s ease-in-out infinite;
    }

    @keyframes neural-pulse {
      0%, 100% { opacity: 0.3; transform: scale(1); }
      50% { opacity: 1; transform: scale(1.5); }
    }

    @keyframes neural-flow {
      0%, 100% { opacity: 0; }
      50% { opacity: 0.7; }
    }

    /* Quantum Particles */
    .quantum-particles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      pointer-events: none;
    }

    .quantum-particle {
      position: absolute;
      width: 3px;
      height: 3px;
      background: #ff00ff;
      border-radius: 50%;
      box-shadow: 0 0 15px #ff00ff;
      animation: quantum-float 8s ease-in-out infinite;
    }

    @keyframes quantum-float {
      0%, 100% { 
        transform: translate(0, 0) scale(1);
        opacity: 0.3;
      }
      25% { 
        transform: translate(100px, -50px) scale(1.2);
        opacity: 0.8;
      }
      50% { 
        transform: translate(-50px, -100px) scale(0.8);
        opacity: 1;
      }
      75% { 
        transform: translate(-100px, 50px) scale(1.1);
        opacity: 0.6;
      }
    }

    /* Code Rain Effects */
    .code-rain {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      pointer-events: none;
      overflow: hidden;
    }

    .code-drop {
      position: absolute;
      color: #00ff00;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      opacity: 0.7;
      white-space: nowrap;
      animation: code-fall 15s linear infinite;
    }

    @keyframes code-fall {
      0% {
        transform: translateY(-100vh);
        opacity: 0;
      }
      10% {
        opacity: 0.7;
      }
      90% {
        opacity: 0.7;
      }
      100% {
        transform: translateY(100vh);
        opacity: 0;
      }
    }

    /* Cursor Trail */
    .cursor-trail {
      position: fixed;
      width: 8px;
      height: 8px;
      background: radial-gradient(circle, #00ffff, transparent);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      animation: trail-fade 1s ease-out forwards;
    }

    @keyframes trail-fade {
      0% {
        transform: scale(1);
        opacity: 1;
      }
      100% {
        transform: scale(0);
        opacity: 0;
      }
    }

    /* Data Streams */
    .data-stream {
      position: fixed;
      width: 1px;
      height: 100vh;
      background: linear-gradient(180deg, 
        transparent, 
        #00ffff, 
        transparent);
      animation: data-flow 3s ease-in-out infinite;
      z-index: 0;
    }

    @keyframes data-flow {
      0%, 100% {
        opacity: 0;
        transform: translateY(-100%);
      }
      50% {
        opacity: 0.5;
        transform: translateY(0);
      }
    }

    /* Particle Beams */
    .particle-beam {
      position: absolute;
      width: 100px;
      height: 2px;
      background: linear-gradient(90deg, 
        transparent, 
        #ff00ff, 
        #00ffff, 
        transparent);
      animation: beam-sweep 4s ease-in-out infinite;
      border-radius: 2px;
    }

    @keyframes beam-sweep {
      0%, 100% {
        opacity: 0;
        transform: translateX(-200px) rotate(45deg);
      }
      50% {
        opacity: 1;
        transform: translateX(200px) rotate(45deg);
      }
    }

    /* Instagram Modal */
    .instagram-modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 10000;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .modal-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.9);
      backdrop-filter: blur(10px);
    }

    .modal-content {
      position: relative;
      background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
      border: 2px solid #00ffff;
      border-radius: 15px;
      padding: 20px;
      max-width: 600px;
      width: 90%;
      max-height: 80vh;
      overflow-y: auto;
      box-shadow: 0 0 50px rgba(0, 255, 255, 0.3);
    }

    .modal-close {
      position: absolute;
      top: 10px;
      right: 15px;
      background: none;
      border: none;
      color: #00ffff;
      font-size: 24px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .modal-close:hover {
      color: #ff00ff;
      transform: scale(1.2);
    }

    .modal-header {
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid #333;
    }

    /* Instagram Post Cards */
    .instagram-post-card {
      cursor: pointer;
      transition: all 0.3s ease;
      transform-style: preserve-3d;
    }

    .instagram-post-card:hover {
      transform: translateY(-10px) rotateX(5deg);
      box-shadow: 0 20px 40px rgba(0, 255, 255, 0.2);
    }

    /* AI Processing Effects */
    .ai-processing {
      position: relative;
      transition: all 0.3s ease;
    }

    .ai-processing::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(45deg, 
        transparent 30%, 
        rgba(0, 255, 255, 0.1) 50%, 
        transparent 70%);
      opacity: 0;
      transition: opacity 0.3s ease;
      pointer-events: none;
    }

    .ai-processing:hover::after {
      opacity: 1;
    }

    /* Floating Interface Elements */
    .floating-interface {
      position: fixed;
      top: 20px;
      right: 20px;
      background: rgba(0, 0, 0, 0.8);
      border: 1px solid #00ffff;
      border-radius: 10px;
      padding: 15px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      color: #00ffff;
      z-index: 1000;
      backdrop-filter: blur(10px);
    }

    .terminal-overlay {
      position: fixed;
      bottom: 20px;
      left: 20px;
      background: rgba(0, 0, 0, 0.9);
      border: 1px solid #00ff00;
      border-radius: 5px;
      padding: 10px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 10px;
      color: #00ff00;
      max-width: 300px;
      max-height: 200px;
      overflow-y: auto;
      z-index: 1000;
    }

    /* Ripple Effect for Buttons */
    .ripple {
      position: absolute;
      border-radius: 50%;
      background: rgba(0, 255, 255, 0.3);
      transform: scale(0);
      animation: ripple-effect 0.6s linear;
      pointer-events: none;
    }

    @keyframes ripple-effect {
      to {
        transform: scale(4);
        opacity: 0;
      }
    }

    /* Konami Mode */
    .konami-mode {
      animation: konami-party 2s ease-in-out infinite;
    }

    @keyframes konami-party {
      0%, 100% { filter: hue-rotate(0deg); }
      25% { filter: hue-rotate(90deg); }
      50% { filter: hue-rotate(180deg); }
      75% { filter: hue-rotate(270deg); }
    }

    /* Performance Optimizations */
    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }

    /* High Performance Mode */
    :root {
      --effect-intensity: 1;
    }

    .quantum-particle,
    .neural-node,
    .particle-beam {
      opacity: calc(0.7 * var(--effect-intensity));
    }

    /* Enhanced Responsive Design */
    @media (max-width: 768px) {
      .floating-interface {
        top: 10px;
        right: 10px;
        font-size: 10px;
        padding: 10px;
      }
      
      .terminal-overlay {
        bottom: 10px;
        left: 10px;
        font-size: 8px;
        padding: 8px;
        max-width: 250px;
      }
      
      .modal-content {
        width: 95%;
        padding: 15px;
      }
    }
  </style>

  <!-- Additional HTML Elements -->
  <div id="particle-beams" class="fixed inset-0 pointer-events-none z-0"></div>
  
  <!-- Floating Interface -->
  <div id="floating-interface" class="floating-interface hidden">
    <div class="text-xs mb-2">⚡ SYSTEM STATUS</div>
    <div>CPU: <span id="cpu-usage">--</span></div>
    <div>RAM: <span id="memory-usage">--</span>GB</div>
    <div>Neural: <span id="neural-links">--</span></div>
    <div>Quantum: <span id="quantum-state">--</span></div>
  </div>
  
  <!-- Terminal Overlay -->
  <div id="terminal-overlay" class="terminal-overlay hidden">
    <div class="text-xs text-green-400 mb-1">$ molzrd@cyberpunk:~</div>
    <div id="terminal-content"></div>
  </div>

  <!-- Additional JavaScript for Enhanced Effects -->
  <script>
    // Enhanced Particle Beam Generator
    function createAdvancedParticleBeams() {
      const container = document.getElementById('particle-beams');
      if (!container) return;
      
      for (let i = 0; i < 15; i++) {
        const beam = document.createElement('div');
        beam.className = 'particle-beam';
        beam.style.left = Math.random() * 100 + '%';
        beam.style.top = Math.random() * 100 + '%';
        beam.style.background = 'linear-gradient(45deg, #00ffff, #ff00ff)';
        beam.style.borderRadius = '50%';
        beam.style.boxShadow = '0 0 10px #00ffff, 0 0 20px #ff00ff';
        beam.style.animation = `beam-travel ${Math.random() * 3 + 2}s linear infinite`;
        beam.style.animationDelay = Math.random() * 2 + 's';
        container.appendChild(beam);
      }
    }

    // Enhanced Instagram Posts Interactions
    function enhanceInstagramInteractions() {
      const posts = document.querySelectorAll('.instagram-post-card');
      
      posts.forEach(post => {
        // Add 3D hover animation
        post.addEventListener('mouseenter', () => {
          post.style.transform = 'scale(1.05) rotateY(5deg) translateZ(20px)';
          post.style.boxShadow = '0 20px 40px rgba(0, 255, 255, 0.3)';
          post.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
        
        post.addEventListener('mouseleave', () => {
          post.style.transform = 'scale(1) rotateY(0deg) translateZ(0)';
          post.style.boxShadow = 'none';
        });
        
        // Enhanced like button interaction
        const likeBtn = post.querySelector('.text-pink-400 span:first-child');
        if (likeBtn) {
          likeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            
            // Create ripple effect
            const ripple = document.createElement('div');
            const rect = likeBtn.getBoundingClientRect();
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 0, 255, 0.5)';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple-effect 0.6s linear';
            ripple.style.left = '50%';
            ripple.style.top = '50%';
            ripple.style.width = '20px';
            ripple.style.height = '20px';
            ripple.style.marginLeft = '-10px';
            ripple.style.marginTop = '-10px';
            
            likeBtn.style.position = 'relative';
            likeBtn.appendChild(ripple);
            
            // Heart pulse animation
            likeBtn.style.animation = 'pulse 0.3s ease-in-out';
            
            setTimeout(() => {
              likeBtn.style.animation = '';
              if (ripple.parentNode) {
                ripple.remove();
              }
            }, 600);
          });
        }
      });
      
      // Enhanced load more posts functionality
      const loadMoreBtn = document.getElementById('load-more-posts');
      if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', (e) => {
          e.preventDefault();
          
          // Create advanced loading animation
          loadMoreBtn.innerHTML = '<span class="animate-spin">🔄</span> CONNECTING TO @MOLZRD...';
          loadMoreBtn.style.background = 'linear-gradient(45deg, #00ffff, #ff00ff)';
          loadMoreBtn.style.backgroundSize = '200% 200%';
          loadMoreBtn.style.animation = 'gradient-shift 1s ease-in-out infinite';
          
          setTimeout(() => {
            loadMoreBtn.innerHTML = '<span class="animate-pulse">🚀</span> OPENING PORTAL...';
          }, 1000);
          
          setTimeout(() => {
            window.open('https://www.instagram.com/molzrd/', '_blank');
            
            // Reset button
            setTimeout(() => {
              loadMoreBtn.innerHTML = `
                <span class="group-hover:hidden transition-all duration-300">📱 VIEW MORE POSTS</span>
                <span class="hidden group-hover:inline transition-all duration-300">🚀 EXPLORE @MOLZRD</span>
              `;
              loadMoreBtn.style.background = '';
              loadMoreBtn.style.animation = '';
            }, 2000);
          }, 2000);
        });
      }
    }

    // Initialize enhanced features
    document.addEventListener('DOMContentLoaded', () => {
      createAdvancedParticleBeams();
      enhanceInstagramInteractions();
      
      console.log('🚀 Enhanced particle beams and Instagram interactions initialized!');
    });
  </script>

  <!-- CSS Animation for Beam Travel -->
  <style>
    @keyframes beam-travel {
      0% {
        transform: translateX(-200px) translateY(-200px) rotate(45deg);
        opacity: 0;
      }
      50% {
        opacity: 1;
      }
      100% {
        transform: translateX(200px) translateY(200px) rotate(45deg);
        opacity: 0;
      }
    }

    @keyframes gradient-shift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
  </style>