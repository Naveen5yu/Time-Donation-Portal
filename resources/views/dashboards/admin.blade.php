<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Time Donation Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
  <style>
    /* Root variables for Neumorphic Light Mode */
    :root {
      --bg: #ecf0f3;
      --text: #34495e;
      --shadow-dark: #a3b1c6;
      --shadow-light: #ffffff;
      --accent-blue: #007bff; /* Primary blue accent */
      --accent-pink: #ff0080; /* Primary pink accent */
      --accent-green: #28a745; /* Primary green accent */

      /* Vibrant gradients for elements (matching seeker) */
      --dashboard-gradient: linear-gradient(135deg, #e0e5ec, #f0f5f8); /* Subtle light gradient for dashboard container */
      --header-text-gradient: linear-gradient(90deg, #34495e, #5a6e81); /* Darker gradient for header text */
      --toggle-gradient-light: linear-gradient(135deg, #a1c4fd, #c2e9fb); /* Light blue for toggle in light mode */
      --logout-gradient: linear-gradient(135deg, #f5576c, #f093fb); /* Soft red-pink for logout */

      /* Card Specific Gradients (matching seeker's module-internal-float) */
      --card-internal-float-1: linear-gradient(45deg, rgba(0,242,254,0.3) 0%, rgba(79,172,254,0.3) 50%, rgba(0,242,254,0.3) 100%);
      /* Floating effect gradients for card (hover) */
      --card-float-gradient-1: linear-gradient(90deg, rgba(0,242,254,0) 0%, rgba(79,172,254,0.5) 50%, rgba(0,242,254,0) 100%);

      --element-text-light: #ffffff; /* Text color for gradient elements */
    }

    body.dark {
      --bg: #1e1e2a;
      --text: #f3f3f3;
      --shadow-dark: #151520;
      --shadow-light: #2a2a3a;
      --accent-blue: #60a5fa; /* Lighter blue accent for dark mode */
      --accent-pink: #ff80a0;
      --accent-green: #90ee90;

      --dashboard-gradient: linear-gradient(135deg, #1e1e2a, #2c2c3a); /* Dark gradient for dashboard container */
      --header-text-gradient: linear-gradient(90deg, #f3f3f3, #d3d3d3); /* Lighter gradient for header text in dark mode */
      --toggle-gradient-dark: linear-gradient(135deg, #ff80a0, #ff0080); /* Pink for toggle in dark mode */
      --logout-gradient: linear-gradient(135deg, #ffdde1, #ee9ca7); /* Inverted soft pink for dark mode logout */

      /* Card Specific Gradients in Dark Mode */
      --card-internal-float-1: linear-gradient(45deg, rgba(253,187,45,0.3) 0%, rgba(178,31,31,0.3) 50%, rgba(253,187,45,0.3) 100%);
      /* Floating effect gradients for card (hover) in Dark Mode */
      --card-float-gradient-1: linear-gradient(90deg, rgba(253,187,45,0) 0%, rgba(178,31,31,0.5) 50%, rgba(253,187,45,0) 100%);

      --element-text-light: #ffffff;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: var(--bg);
      color: var(--text);
      display: flex;
      min-height: 100vh;
      transition: all 0.5s ease-in-out;
      overflow: hidden; /* Prevent scroll */
      position: relative;
    }

    /* Sidebar - Matching seeker's dashboard container as a base */
    .sidebar {
      width: 240px;
      background: var(--dashboard-gradient); /* Use dashboard gradient for sidebar */
      padding: 20px;
      box-shadow: 15px 15px 30px var(--shadow-dark),
                  -15px -15px 30px var(--shadow-light); /* Deeper shadow like seeker's main container */
      border-radius: 0 25px 25px 0; /* Matching seeker's border-radius for container */
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all 0.5s ease-in-out;
      z-index: 2; /* Ensure sidebar is above content for visual hierarchy */
    }

    .logo {
      width: 90px; /* Matching seeker's logo size */
      height: 90px; /* Matching seeker's logo size */
      border-radius: 50%;
      background: var(--bg);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.6rem; /* Matching seeker's logo font size */
      font-family: 'Orbitron', sans-serif;
      color: var(--accent-blue);
      margin-bottom: 25px; /* Matching seeker's margin */
      box-shadow: inset 6px 6px 12px var(--shadow-dark),
                  inset -6px -6px 12px var(--shadow-light);
      transition: all 0.5s ease-in-out;
    }

    .sidebar h2 {
      font-size: 1.4rem;
      font-family: 'Orbitron', sans-serif;
      margin-bottom: 25px;
      color: var(--text);
      transition: color 0.5s ease-in-out;
    }

    .sidebar a {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      border-radius: 30px;
      text-align: center;
      background: var(--bg);
      text-decoration: none;
      color: var(--text);
      font-weight: 500;
      box-shadow: 6px 6px 12px var(--shadow-dark),
                  -6px -6px 12px var(--shadow-light);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      z-index: 1; /* Ensure text is above pseudo-element */
    }

    /* Floating color effect for sidebar links on hover (matching seeker's module-card hover) */
    .sidebar a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--card-internal-float-1); /* Use internal float gradient for base hover */
      opacity: 1; /* Always visible as background base */
      transition: opacity 0.3s ease;
      border-radius: 30px;
      z-index: -2; /* Below the floating effect and content */
      background-size: 200% 200%; /* For animation */
      animation: gradientShift 15s ease infinite alternate; /* Continuous subtle float */
    }

    .sidebar a::after {
      content: '';
      position: absolute;
      top: 0;
      left: -100%; /* Start off-screen to the left */
      width: 100%;
      height: 100%;
      background: var(--card-float-gradient-1); /* The "floating water" gradient on hover */
      transition: transform 0.5s ease-out, opacity 0.5s ease-out;
      opacity: 0; /* Initially hidden */
      border-radius: 30px;
      z-index: -1; /* Above the base gradient but below text */
    }

    .sidebar a:hover::after {
      transform: translateX(100%); /* Float across to the right */
      opacity: 1; /* Make it visible */
      transition: transform 0.5s ease-out, opacity 0.3s ease-in 0.2s; /* Delay opacity for fade-in effect */
    }
    .sidebar a:hover {
      color: var(--element-text-light); /* Light text on gradient hover */
      text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }
    .sidebar a:active {
      box-shadow: inset 8px 8px 16px var(--shadow-dark), inset -8px -8px 16px var(--shadow-light);
      transform: scale(0.98);
    }

    /* Content */
    .content {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      align-items: center; /* Center content within the flex column */
      transition: all 0.5s ease-in-out;
      position: relative;
      z-index: 1; /* Ensure content is above sidebar */
      backdrop-filter: blur(5px); /* Subtle blur to container to make background less distracting */
    }

    .content h1 {
      font-size: 2.2rem;
      font-family: 'Orbitron', sans-serif;
      background: var(--header-text-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      transition: all 0.5s ease-in-out;
    }

    .card {
      background: var(--bg); /* Base background, will be covered by pseudo-elements */
      padding: 25px;
      border-radius: 25px;
      margin-bottom: 20px;
      color: var(--text); /* Default text color */
      text-shadow: 1px 1px 2px rgba(0,0,0,0.05);
      box-shadow: 12px 12px 24px var(--shadow-dark), -12px -12px 24px var(--shadow-light);
      width: 350px;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
      z-index: 0; /* Ensures proper layering */
    }

    /* Base gradient (always visible, subtle float) for cards (matching seeker's module-card) */
    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 1; /* Always visible */
      transition: opacity 0.4s ease;
      border-radius: 25px; /* Match card border-radius */
      z-index: -2; /* Below the floating effect and content */
      background-size: 200% 200%; /* For animation */
      animation: gradientShift 15s ease infinite alternate; /* Continuous subtle float */
      background: var(--card-internal-float-1); /* Apply internal float gradient */
    }

    /* Floating effect for cards (on hover) */
    .card::after {
      content: '';
      position: absolute;
      top: 0;
      left: -100%; /* Start off-screen to the left */
      width: 100%;
      height: 100%;
      background: var(--card-float-gradient-1); /* The "floating water" gradient */
      transition: transform 0.6s ease-out, opacity 0.4s ease-out;
      opacity: 0; /* Initially hidden */
      border-radius: 25px; /* Match card border-radius */
      z-index: -1; /* Above the base gradient but below text */
    }

    /* Animation for continuous internal gradient float */
    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }


    .card:hover::after {
      transform: translateX(100%); /* Float across to the right */
      opacity: 1; /* Make it visible */
      transition: transform 0.6s ease-out, opacity 0.3s ease-in 0.2s; /* Delay opacity for fade-in effect */
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 10px 10px 20px var(--shadow-dark), -10px -10px 20px var(--shadow-light);
      color: var(--element-text-light); /* Light text on gradient hover */
      text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }
    .card:active {
        box-shadow: inset 5px 5px 10px var(--shadow-dark),
                    inset -5px -5px 10px var(--shadow-light);
        transform: scale(0.98);
    }


    .card h2 {
      font-size: 1.3rem;
      margin-bottom: 15px;
      color: var(--text);
      transition: color 0.4s ease;
      position: relative; /* Ensure text is above pseudo-elements */
      z-index: 1;
    }
    .card:hover h2, .card:hover p {
        color: var(--element-text-light); /* Light text on hover over floating color */
    }

    .card p {
      margin: 8px 0;
      color: var(--text);
      font-size: 1.1rem;
      transition: color 0.4s ease;
      position: relative; /* Ensure text is above pseudo-elements */
      z-index: 1;
    }
    
    /* Toggle Button - Redesigned (matching seeker) */
    .toggle-btn {
      width: 60px; /* Wider to resemble a switch */
      height: 30px; /* Shorter */
      border-radius: 15px; /* Pill shape */
      background: var(--bg); /* Base background for the switch track */
      box-shadow: inset 2px 2px 5px var(--shadow-dark), 
                  inset -2px -2px 5px var(--shadow-light); /* Inset shadow for the track */
      position: relative;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex; /* Use flex to center the icon/text */
      align-items: center;
      justify-content: center;
      overflow: hidden; /* Hide anything outside the pill */
      margin-top: 25px; /* Adjust margin */
    }

    /* Toggle Switch handle/indicator */
    .toggle-btn::before {
      content: '';
      position: absolute;
      left: 3px; /* Initial position for light mode */
      width: 24px; /* Size of the handle */
      height: 24px;
      border-radius: 50%;
      background: var(--toggle-gradient-light); /* Light mode handle color */
      box-shadow: 3px 3px 6px var(--shadow-dark), -3px -3px 6px var(--shadow-light); /* Handle's own shadow */
      transition: all 0.3s ease;
      z-index: 2; /* Above the track */
    }

    /* Toggle icon/text inside the handle */
    .toggle-btn .icon {
      position: absolute;
      font-size: 1rem;
      font-weight: bold;
      color: var(--element-text-light); /* Light icon color */
      transition: all 0.3s ease;
      z-index: 3; /* Above the handle */
      left: 10px; /* Initial position for light mode icon */
    }

    /* Dark Mode specific styles for toggle button */
    body.dark .toggle-btn::before {
      transform: translateX(30px); /* Move handle to the right for dark mode */
      background: var(--toggle-gradient-dark); /* Dark mode handle color */
    }

    body.dark .toggle-btn .icon {
      left: 36px; /* Move icon to the right for dark mode */
    }
    
    .toggle-btn:hover {
        box-shadow: inset 1px 1px 3px var(--shadow-dark), 
                    inset -1px -1px 3px var(--shadow-light); /* Subtle press effect on track */
    }
    .toggle-btn:active {
        box-shadow: inset 2px 2px 5px var(--shadow-dark), 
                    inset -2px -2px 5px var(--shadow-light);
    }

    /* Logout button */
    .logout-btn {
      padding: 15px 30px;
      border: none;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      background: var(--logout-gradient); /* Apply logout gradient */
      color: var(--element-text-light); /* Light text on gradient */
      text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
      box-shadow: 8px 8px 16px rgba(245, 87, 108, 0.4), -8px -8px 16px var(--shadow-light);
      transition: all 0.3s ease;
      margin-top: 20px;
      width: 200px;
    }

    .logout-btn:hover {
      box-shadow: inset 6px 6px 12px rgba(245, 87, 108, 0.5), inset -6px -6px 12px var(--shadow-light);
      transform: scale(0.98);
      color: white;
    }
    .logout-btn:active {
        box-shadow: inset 8px 8px 16px rgba(245, 87, 108, 0.6), inset -8px -8px 16px var(--shadow-light);
        transform: scale(0.95);
    }

  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo">TDP</div>
    <h2>Admin Control</h2>
    <a href="{{ route('admin.users.index') }}">User Management</a>
    <a href="{{ route('admin.reports.index') }}">Reports</a>
  </div>

  <div class="content">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <div class="card">
      <h2>Quick Stats</h2>
      <p>Users Registered: {{ $userCount }}</p>
      <p>Reports Generated: {{ $reportCount }}</p>
    </div>

    <!-- Toggle Button -->
    <button class="toggle-btn" id="themeToggle" onclick="toggleMode()">
      <span class="icon">🌙</span>
    </button>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>

  <script>
    const toggleBtn = document.getElementById('themeToggle');
    const toggleIcon = toggleBtn.querySelector('.icon');

    function toggleMode() {
      document.body.classList.toggle('dark');
      // Update emoji after toggle
      if (document.body.classList.contains('dark')) {
        toggleIcon.textContent = '☀️';
      } else {
        toggleIcon.textContent = '🌙';
      }
    }

    // Set initial emoji when the page loads
    window.onload = function() {
      if (document.body.classList.contains('dark')) {
        toggleIcon.textContent = '☀️';
      } else {
        toggleIcon.textContent = '🌙';
      }
    };
  </script>
</body>
</html>
