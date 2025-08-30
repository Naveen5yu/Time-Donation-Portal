<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Chat with Seeker</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            overflow-x: hidden;
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

        /* Header */
        header {
            width: 100%;
            padding: 20px;
            background: linear-gradient(90deg, #e0e5ec, #d1d9e6);
            text-align: center;
            box-shadow: 12px 12px 24px #a3b1c6,
                        -12px -12px 24px #ffffff;
            border-radius: 0 0 25px 25px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        body.dark-mode header {
            background: linear-gradient(90deg, #2b2e3b, #1f222e);
            box-shadow: 12px 12px 24px #1c1e26,
                        -12px -12px 24px #3a3e4f;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
            font-family: 'Orbitron', sans-serif;
            background: linear-gradient(90deg, #34495e, #5a6e81);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            animation: pulse 2s ease-in-out infinite;
        }

        body.dark-mode header h1 {
            background: linear-gradient(90deg, #f3f3f3, #d3d3d3);
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }

        /* Toggle Button */
        .toggle-btn {
            position: absolute;
            top: 20px;
            right: 20px;
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

        body.dark-mode .toggle-btn {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .toggle-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .toggle-btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Back to Dashboard Button */
        .back-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 12px 24px;
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 25px;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .back-btn {
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        .back-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .back-btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Filter Section */
        .filter-section {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-input {
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

        body.dark-mode .filter-input {
            background: #2b2e3b;
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .filter-input:focus {
            outline: none;
            border: 1px solid #3b82f6;
        }

        body.dark-mode .filter-input:focus {
            border: 1px solid #6ee7b7;
        }

        /* Chat Container */
        .chat-container {
            width: 90%;
            max-width: 700px;
            padding: 20px;
            background: #e0e5ec;
            border-radius: 25px;
            box-shadow: 12px 12px 24px #a3b1c6,
                        -12px -12px 24px #ffffff;
            display: flex;
            flex-direction: column;
            gap: 15px;
            transition: all 0.3s ease;
        }

        body.dark-mode .chat-container {
            background: #2b2e3b;
            box-shadow: 12px 12px 24px #1c1e26,
                        -12px -12px 24px #3a3e4f;
        }

        /* Chat Box */
        #chat-box {
            height: 400px;
            overflow-y: auto;
            padding: 15px;
            border-radius: 15px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            display: flex;
            flex-direction: column;
            gap: 10px;
            transition: all 0.3s ease;
        }

        body.dark-mode #chat-box {
            background: linear-gradient(135deg, #2d2f3a, #1f222e);
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Chat Message */
        .chat-message {
            max-width: 70%;
            margin: 5px 0;
            padding: 8px 12px;
            border-radius: 8px;
            word-break: break-word;
            font-size: 0.95rem;
            box-shadow: 4px 4px 8px #a3b1c6,
                        -4px -4px 8px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .chat-message {
            box-shadow: 4px 4px 8px #1c1e26,
                        -4px -4px 8px #3a3e4f;
        }

        .chat-message.own {
            background: linear-gradient(135deg, #d1e7dd, #c3e6cb);
            align-self: flex-end;
        }

        .chat-message.other {
            background: linear-gradient(135deg, #e2e3e5, #d6d8db);
            align-self: flex-start;
        }

        body.dark-mode .chat-message.own {
            background: linear-gradient(135deg, #2e7d32, #1b5e20);
        }

        body.dark-mode .chat-message.other {
            background: linear-gradient(135deg, #3a3b3c, #2c2d2e);
        }

        .chat-message:hover {
            transform: translateY(-2px);
            box-shadow: 3px 3px 6px #a3b1c6,
                        -3px -3px 6px #ffffff;
        }

        body.dark-mode .chat-message:hover {
            box-shadow: 3px 3px 6px #1c1e26,
                        -3px -3px 6px #3a3e4f;
        }

        .chat-message small {
            display: block;
            font-size: 0.75rem;
            color: #666;
            margin-top: 3px;
        }

        body.dark-mode .chat-message small {
            color: #b0b3c1;
        }

        /* Chat Form */
        .chat-form {
            display: flex;
            gap: 10px;
        }

        .chat-input {
            flex: 1;
            padding: 12px;
            border-radius: 15px;
            border: none;
            outline: none;
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            transition: all 0.3s ease;
        }

        body.dark-mode .chat-input {
            background: #2b2e3b;
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .chat-input:focus {
            outline: none;
            border: 1px solid #3b82f6;
        }

        body.dark-mode .chat-input:focus {
            border: 1px solid #6ee7b7;
        }

        .btn {
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #333;
            background: #e0e5ec;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .btn {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
            color: #3b82f6;
        }

        body.dark-mode .btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
            color: #6ee7b7;
        }

        /* Footer */
        footer {
            margin-top: auto;
            padding: 15px;
            font-size: 0.9rem;
            color: #34495e;
            background: linear-gradient(90deg, #e0e5ec, #d1d9e6);
            width: 100%;
            text-align: center;
            border-radius: 25px 25px 0 0;
            box-shadow: 12px -12px 24px #a3b1c6,
                        -12px 12px 24px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode footer {
            background: linear-gradient(90deg, #2b2e3b, #1f222e);
            box-shadow: 12px -12px 24px #1c1e26,
                        -12px 12px 24px #3a3e4f;
            color: #e0e5ec;
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

        #chat-box::-webkit-scrollbar {
            width: 6px;
        }

        #chat-box::-webkit-scrollbar-track {
            background: #e0e5ec;
            border-radius: 3px;
        }

        body.dark-mode #chat-box::-webkit-scrollbar-track {
            background: #2b2e3b;
        }

        #chat-box::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #6ee7b7, #3b82f6);
            border-radius: 3px;
        }

        #chat-box::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #3b82f6, #6ee7b7);
        }
    </style>
</head>
<body>
  <header>
    <h1>Chat with Seeker</h1>
    <a href="{{ route('donor.dashboard') }}" class="back-btn">⬅ Back to Dashboard</a>
    <button class="toggle-btn">Toggle Dark Mode</button>
  </header>

  <div class="chat-container">
    <div class="filter-section">
        <input type="text" id="message-search" class="filter-input" placeholder="Search messages...">
    </div>
    <div id="chat-box" data-fetch-url="{{ route('chat.fetch', $timeRequest->id) }}">
      <!-- Messages will load here -->
    </div>

    <form id="chat-form" class="chat-form" action="{{ route('chat.send', $timeRequest->id) }}" method="POST">
        @csrf
        <input type="text" id="chat-input" name="message" class="chat-input" placeholder="Type your message...">
        <button type="submit" class="btn">Send</button>
    </form>
  </div>

  <footer>
    &copy; {{ date('Y') }} Time Donation Portal. All rights reserved.
  </footer>

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

    // Chat Functionality
    document.addEventListener("DOMContentLoaded", function () {
        const chatForm = document.getElementById("chat-form");
        const chatInput = document.getElementById("chat-input");
        const chatBox = document.getElementById("chat-box");
        const searchInput = document.getElementById("message-search");

        let lastMessageCount = 0;

        function scrollToBottom() {
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        function appendMessage(data, isOwn = false) {
            const div = document.createElement("div");
            div.classList.add("chat-message", isOwn ? "own" : "other");
            div.setAttribute("data-message", data.message.toLowerCase());
            div.innerHTML = `<p>${data.message}</p><small>${data.time}</small>`;
            chatBox.appendChild(div);
            filterMessages(); // Apply filter after adding new message
            scrollToBottom();
        }

        function filterMessages() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const messages = chatBox.querySelectorAll('.chat-message');

            messages.forEach(message => {
                const messageText = message.dataset.message;
                const matchesSearch = !searchTerm || messageText.includes(searchTerm);
                message.style.display = matchesSearch ? 'flex' : 'none';
            });

            // Show empty state if no messages match
            const visibleMessages = chatBox.querySelectorAll('.chat-message[style="display: flex;"]').length;
            if (visibleMessages === 0 && messages.length > 0) {
                chatBox.innerHTML = '<div style="text-align: center; color: #666; padding: 10px;">No messages match your search.</div>';
            } else if (visibleMessages > 0) {
                // Restore original content if filter is cleared
                messages.forEach(msg => msg.style.display = 'flex');
            }
        }

        chatForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const message = chatInput.value.trim();
            if (!message) return;

            fetch(chatForm.action, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ message })
            })
            .then(res => res.json())
            .then(data => {
                chatInput.value = "";
                appendMessage(data, true);
            })
            .catch(console.error);
        });

        setInterval(() => {
            fetch(chatBox.dataset.fetchUrl)
                .then(res => res.json())
                .then(messages => {
                    if (messages.length !== lastMessageCount) {
                        messages.slice(lastMessageCount).forEach(msg => appendMessage(msg, msg.is_own));
                        lastMessageCount = messages.length;
                        filterMessages(); // Apply filter after new messages
                    }
                });
        }, 2000);

        searchInput.addEventListener('input', filterMessages);
        scrollToBottom();
    });
  </script>
</body>
</html>