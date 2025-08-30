<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Donor Dashboard - Time Donation Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
  <style>
    /* Global Neumorphic Base */
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #e0e5ec 0%, #d1d9e6 100%);
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      padding: 0 20px;
      transition: all 0.3s ease;
    }

    body.dark-mode {
      background: linear-gradient(135deg, #2b2e3b 0%, #1f222e 100%);
      color: #e0e5ec;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Stronger Neumorphic Navbar */
    .navbar {
      width: 100%;
      max-width: 900px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 30px;
      background: #e0e5ec;
      box-shadow: 12px 12px 24px #a3b1c6,
                  -12px -12px 24px #ffffff;
      border-radius: 0 0 25px 25px;
      margin-bottom: 40px;
      position: sticky;
      top: 0;
      z-index: 10;
      transition: all 0.3s ease;
    }

    body.dark-mode .navbar {
      background: #2b2e3b;
      box-shadow: 12px 12px 24px #1c1e26,
                  -12px -12px 24px #3a3e4f;
    }

    .navbar-left h2 {
      margin: 0;
      font-size: 1.4rem;
      font-weight: 700;
      color: #3b82f6;
    }

    body.dark-mode .navbar-left h2 {
      color: #6ee7b7;
    }

    .navbar-right {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .toggle-btn, .logout-btn {
      padding: 10px 20px;
      border: none;
      border-radius: 25px;
      font-weight: 600;
      cursor: pointer;
      background: #e0e5ec;
      color: #333;
      box-shadow: 6px 6px 12px #a3b1c6,
                  -6px -6px 12px #ffffff;
      transition: all 0.3s ease;
    }

    body.dark-mode .toggle-btn, body.dark-mode .logout-btn {
      background: #2b2e3b;
      box-shadow: 6px 6px 12px #1c1e26,
                  -6px -6px 12px #3a3e4f;
      color: #e0e5ec;
    }

    .toggle-btn:hover, .logout-btn:hover {
      box-shadow: inset 6px 6px 12px #a3b1c6,
                  inset -6px -6px 12px #ffffff;
      transform: scale(1.05);
    }

    body.dark-mode .toggle-btn:hover, body.dark-mode .logout-btn:hover {
      box-shadow: inset 6px 6px 12px #1c1e26,
                  inset -6px -6px 12px #3a3e4f;
    }

    /* Header */
    .header {
      text-align: center;
      margin: 0 0 40px 0;
    }

    .header h1 {
      margin: 0;
      font-size: 2.5rem;
      font-family: 'Orbitron', sans-serif;
      font-weight: 700;
      color: #3b82f6;
      animation: pulse 2s ease-in-out infinite;
    }

    body.dark-mode .header h1 {
      color: #6ee7b7;
    }

    .header h3 {
      margin: 10px 0 0 0;
      font-size: 1.5rem;
      font-weight: 600;
      color: #3b82f6;
    }

    body.dark-mode .header h3 {
      color: #6ee7b7;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.02); }
      100% { transform: scale(1); }
    }

    /* Dashboard Cards */
    .dashboard {
      width: 100%;
      max-width: 900px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 30px;
      flex-wrap: wrap;
      padding-bottom: 40px;
    }

    .card {
      width: 250px;
      height: 180px;
      border-radius: 25px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.3rem;
      font-weight: 700;
      color: #fff;
      box-shadow: 12px 12px 24px #a3b1c6,
                  -12px -12px 24px #ffffff;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      animation: pulse 2s ease-in-out infinite;
    }

    body.dark-mode .card {
      box-shadow: 12px 12px 24px #1c1e26,
                  -12px -12px 24px #3a3e4f;
    }

    .card-my-donations {
      background: linear-gradient(135deg, #3b82f6, #1e40af);
    }

    .card-seeker-requests {
      background: linear-gradient(135deg, #a855f7, #6b21a8);
    }

    .card-chat {
      background: linear-gradient(135deg, #2dd4bf, #0d9488);
    }

    .card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: inset 10px 10px 20px #a3b1c6,
                  inset -10px -10px 20px #ffffff;
    }

    body.dark-mode .card:hover {
      box-shadow: inset 10px 10px 20px #1c1e26,
                  inset -10px -10px 20px #3a3e4f;
    }

    /* Card Tooltip */
    .card .tooltip {
      visibility: hidden;
      opacity: 0;
      position: absolute;
      top: -40px;
      left: 50%;
      transform: translateX(-50%) translateY(10px);
      background: #e0e5ec;
      box-shadow: 6px 6px 12px #a3b1c6,
                  -6px -6px 12px #ffffff;
      padding: 8px 12px;
      border-radius: 10px;
      font-size: 0.9rem;
      font-weight: 600;
      color: #333;
      white-space: nowrap;
      z-index: 10;
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    body.dark-mode .card .tooltip {
      background: #2b2e3b;
      box-shadow: 6px 6px 12px #1c1e26,
                  -6px -6px 12px #3a3e4f;
      color: #e0e5ec;
    }

    .card:hover .tooltip {
      visibility: visible;
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }

    /* Chat List */
    .chat-list {
      width: 100%;
      max-width: 900px;
      padding: 30px;
      background: #e0e5ec;
      border-radius: 25px;
      box-shadow: 12px 12px 24px #a3b1c6,
                  -12px -12px 24px #ffffff;
      margin-bottom: 40px;
      transition: all 0.3s ease;
    }

    body.dark-mode .chat-list {
      background: #2b2e3b;
      box-shadow: 12px 12px 24px #1c1e26,
                  -12px -12px 24px #3a3e4f;
    }

    .chat-list h3 {
      font-size: 1.8rem;
      font-weight: 800;
      color: #3b82f6;
      margin-bottom: 20px;
    }

    body.dark-mode .chat-list h3 {
      color: #6ee7b7;
    }

    /* Filter Section */
    .filter-section {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }

    .filter-input, .filter-select {
      padding: 12px;
      border: none;
      border-radius: 15px;
      background: #e0e5ec;
      box-shadow: inset 6px 6px 12px #a3b1c6,
                  inset -6px -6px 12px #ffffff;
      font-size: 1rem;
      font-weight: 600;
      color: #333;
      transition: all 0.3s ease;
    }

    body.dark-mode .filter-input, body.dark-mode .filter-select {
      background: #2b2e3b;
      box-shadow: inset 6px 6px 12px #1c1e26,
                  inset -6px -6px 12px #3a3e4f;
      color: #e0e5ec;
    }

    .filter-input:focus, .filter-select:focus {
      outline: none;
      border: 1px solid #3b82f6;
    }

    body.dark-mode .filter-input:focus, body.dark-mode .filter-select:focus {
      border: 1px solid #6ee7b7;
    }

    /* Chat Item */
    .chat-item {
      padding: 25px;
      border-radius: 15px;
      margin-bottom: 20px;
      color: #fff;
      box-shadow: 8px 8px 16px #a3b1c6,
                  -8px -8px 16px #ffffff;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      font-size: 1.2rem;
      font-weight: 700;
      border: 1px solid rgba(59, 130, 246, 0.3);
      display: block;
      width: 100%;
    }

    body.dark-mode .chat-item {
      box-shadow: 8px 8px 16px #1c1e26,
                  -8px -8px 16px #3a3e4f;
      border: 1px solid rgba(110, 231, 183, 0.3);
    }

    .chat-item:nth-child(odd) {
      background: linear-gradient(135deg, #60a5fa, #3b82f6);
    }

    .chat-item:nth-child(even) {
      background: linear-gradient(135deg, #6ee7b7, #059669);
    }

    .chat-item:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: inset 8px 8px 16px #a3b1c6,
                  inset -8px -8px 16px #ffffff;
    }

    body.dark-mode .chat-item:hover {
      box-shadow: inset 8px 8px 16px #1c1e26,
                  inset -8px -8px 16px #3a3e4f;
    }

    .chat-item small {
      display: block;
      font-size: 0.9rem;
      font-style: italic;
      color: #e0e5ec;
      margin-top: 8px;
      opacity: 0.9;
    }

    /* Chat Preview Tooltip */
    .chat-item .tooltip {
      visibility: hidden;
      opacity: 0;
      position: absolute;
      top: -60px;
      left: 50%;
      transform: translateX(-50%) translateY(10px);
      background: #e0e5ec;
      box-shadow: 6px 6px 12px #a3b1c6,
                  -6px -6px 12px #ffffff;
      padding: 10px 14px;
      border-radius: 10px;
      font-size: 0.9rem;
      font-weight: 600;
      color: #333;
      max-width: 250px;
      text-align: center;
      white-space: normal;
      z-index: 10;
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    body.dark-mode .chat-item .tooltip {
      background: #2b2e3b;
      box-shadow: 6px 6px 12px #1c1e26,
                  -6px -6px 12px #3a3e4f;
      color: #e0e5ec;
    }

    .chat-item:hover .tooltip {
      visibility: visible;
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }

    .no-chats {
      color: #555;
      text-align: center;
      padding: 20px;
      font-size: 1.2rem;
      font-weight: 600;
    }

    body.dark-mode .no-chats {
      color: #b0b3c1;
    }

    /* Custom Scrollbar */
    body::-webkit-scrollbar {
      width: 8px;
    }

    body::-webkit-scrollbar-track {
      background: #e0e5ec;
      border-radius: 4px;
    }

    body.dark-mode::-webkit-scrollbar-track {
      background: #2b2e3b;
    }

    body::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, #6ee7b7, #3b82f6);
      border-radius: 4px;
    }

    body::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(180deg, #3b82f6, #6ee7b7);
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-left">
      <h2>Welcome, {{ Auth::user()->name }}</h2>
    </div>
    <div class="navbar-right">
      <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
      </form>
      <button class="toggle-btn">Toggle Dark Mode</button>
    </div>
  </div>

  <!-- Page Header -->
  <div class="header">
    <h1>Donor Dashboard</h1>
    <h3>TDP</h3>
  </div>

  <!-- Dashboard Cards -->
  <div class="dashboard">
    <a href="{{ route('donor.my_donations') }}" class="card card-my-donations">
      My Donations
      <span class="tooltip">View your donations</span>
    </a>
    <a href="{{ route('donor.seeker_requests') }}" class="card card-seeker-requests">
      Seeker Requests
      <span class="tooltip">View seeker requests</span>
    </a>
  </div>

  <!-- Chat List -->
  <div class="chat-list">
    <h3>Active Chats</h3>
    <div class="filter-section">
      <input type="text" id="chat-search" class="filter-input" placeholder="Search chats by title...">
      <select id="chat-status" class="filter-select">
        <option value="all">All</option>
        <option value="active">Active</option>
      </select>
    </div>
    <div id="chat-items">
      @if ($donations->isEmpty())
          <p class="no-chats">No active chats available.</p>
      @else
          @foreach ($donations as $donation)
              <a href="{{ route('donor.chat', ['timeRequest' => $donation->id]) }}" 
                 class="chat-item" 
                 data-title="{{ strtolower($donation->title) }}" 
                 data-status="active"
                 data-latest-message="{{ $donation->messages->isNotEmpty() ? $donation->messages->first()->message : '' }}"
                 data-sender="{{ $donation->messages->isNotEmpty() ? ($donation->messages->first()->sender_name ?? 'Unknown') : 'Unknown' }}">
                  Chat for {{ $donation->title }}
                  @if ($donation->messages->isNotEmpty())
                      <small>(Last message: {{ $donation->messages->first()->created_at->diffForHumans() }})</small>
                      <span class="tooltip">From: {{ $donation->messages->isNotEmpty() ? ($donation->messages->first()->sender_name ?? 'Unknown') : 'Unknown' }}<br>{{ Str::limit($donation->messages->isNotEmpty() ? $donation->messages->first()->message : 'No messages yet', 50) }}</span>
                  @else
                      <span class="tooltip">No messages yet</span>
                  @endif
              </a>
          @endforeach
      @endif
    </div>
  </div>

  <script>
    // Dark Mode Toggle
    const toggleBtn = document.querySelector('.toggle-btn');
    if (toggleBtn) {
      toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        toggleBtn.textContent = document.body.classList.contains('dark-mode') 
          ? 'Toggle Light Mode' 
          : 'Toggle Dark Mode';
      });
    } else {
      console.error('Toggle button not found');
    }

    // Chat Filter
    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.getElementById('chat-search');
      const statusSelect = document.getElementById('chat-status');
      const chatItems = document.querySelectorAll('.chat-item');

      function filterChats() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const status = statusSelect.value;

        chatItems.forEach(item => {
          const title = item.dataset.title;
          const itemStatus = item.dataset.status;
          const matchesSearch = title.includes(searchTerm);
          const matchesStatus = status === 'all' || itemStatus === status;

          if (matchesSearch && matchesStatus) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });

        const visibleChats = document.querySelectorAll('.chat-item[style="display: block;"]').length;
        const noChatsMessage = document.querySelector('.no-chats');
        if (visibleChats === 0 && noChatsMessage) {
          noChatsMessage.style.display = 'block';
        } else if (noChatsMessage) {
          noChatsMessage.style.display = 'none';
        }
      }

      searchInput.addEventListener('input', filterChats);
      statusSelect.addEventListener('change', filterChats);
    });
  </script>
</body>
</html>