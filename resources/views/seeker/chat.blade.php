<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Chat with Donor - Time Donation Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Global Neumorphic Base */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #e0e5ec;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        body.dark-mode {
            background: #2b2e3b;
            color: #e0e5ec;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Stronger Neumorphic Header */
        header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: #e0e5ec;
            box-shadow: 12px 12px 24px #a3b1c6,
                        -12px -12px 24px #ffffff;
            border-radius: 0 0 20px 20px;
            position: sticky;
            top: 0;
            z-index: 10;
            transition: all 0.3s ease;
        }

        body.dark-mode header {
            background: #2b2e3b;
            box-shadow: 12px 12px 24px #1c1e26,
                        -12px -12px 24px #3a3e4f;
        }

        header .logo {
            font-size: 1.2rem;
            font-weight: 800;
            color: #3b82f6;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        body.dark-mode header .logo {
            color: #6ee7b7;
        }

        header h1 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #3b82f6;
            margin: 0;
        }

        body.dark-mode header h1 {
            color: #6ee7b7;
        }

        .header-links a, .toggle-btn {
            margin-left: 20px;
            padding: 10px 20px;
            border-radius: 25px;
            background: #e0e5ec;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            color: #333;
        }

        body.dark-mode .header-links a, body.dark-mode .toggle-btn {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .header-links a:hover, .toggle-btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
        }

        body.dark-mode .header-links a:hover, body.dark-mode .toggle-btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Chat Container */
        .chat-container {
            width: 90%;
            max-width: 700px;
            padding: 20px;
            background: #e0e5ec;
            border-radius: 25px;
            box-shadow: 10px 10px 20px #a3b1c6,
                        -10px -10px 20px #ffffff;
            display: flex;
            flex-direction: column;
            gap: 15px;
            transition: all 0.3s ease;
        }

        body.dark-mode .chat-container {
            background: #2b2e3b;
            box-shadow: 10px 10px 20px #1c1e26,
                        -10px -10px 20px #3a3e4f;
        }

        #chat-box {
            height: 400px;
            overflow-y: auto;
            padding: 15px;
            border-radius: 15px;
            background: #e0e5ec;
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            display: flex;
            flex-direction: column;
        }

        body.dark-mode #chat-box {
            background: #2b2e3b;
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        .chat-message {
            max-width: 70%;
            margin: 5px 0;
            padding: 8px 12px;
            border-radius: 8px;
            word-break: break-word;
            font-size: 0.95rem;
        }

        .chat-message.own {
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            color: #fff;
            align-self: flex-end;
        }

        .chat-message.other {
            background: linear-gradient(135deg, #d1d5db, #9ca3af);
            color: #333;
            align-self: flex-start;
        }

        body.dark-mode .chat-message.other {
            background: linear-gradient(135deg, #4b5563, #374151);
            color: #e0e5ec;
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

        .chat-form {
            display: flex;
            gap: 10px;
            position: relative;
        }

        .chat-input {
            flex: 1;
            padding: 12px;
            border-radius: 15px;
            border: none;
            outline: none;
            background: #e0e5ec;
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            color: #333;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        body.dark-mode .chat-input {
            background: #2b2e3b;
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
            color: #e0e5ec;
        }

        .chat-input:focus {
            border: 1px solid #3b82f6;
        }

        body.dark-mode .chat-input:focus {
            border: 1px solid #6ee7b7;
        }

        .btn {
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, #6ee7b7, #3b82f6);
            border: none;
            border-radius: 15px;
            cursor: pointer;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode .btn {
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
        }

        .btn:hover {
            box-shadow: inset 6px 6px 12px #a3b1c6,
                        inset -6px -6px 12px #ffffff;
            transform: scale(1.05);
        }

        body.dark-mode .btn:hover {
            box-shadow: inset 6px 6px 12px #1c1e26,
                        inset -6px -6px 12px #3a3e4f;
        }

        /* Typing Indicator */
        .typing-indicator {
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background: #e0e5ec;
            box-shadow: 6px 6px 12px #a3b1c6,
                        -6px -6px 12px #ffffff;
            padding: 6px 10px;
            border-radius: 10px;
            font-size: 0.8rem;
            color: #3b82f6;
            visibility: hidden;
            transition: visibility 0.3s ease;
        }

        body.dark-mode .typing-indicator {
            background: #2b2e3b;
            box-shadow: 6px 6px 12px #1c1e26,
                        -6px -6px 12px #3a3e4f;
            color: #6ee7b7;
        }

        .typing-indicator.active {
            visibility: visible;
        }

        /* Footer */
        footer {
            margin-top: auto;
            padding: 15px;
            font-size: 0.9rem;
            color: #333;
            background: #e0e5ec;
            width: 100%;
            text-align: center;
            border-radius: 20px 20px 0 0;
            box-shadow: 6px -6px 12px #a3b1c6,
                        -6px 6px 12px #ffffff;
            transition: all 0.3s ease;
        }

        body.dark-mode footer {
            color: #e0e5ec;
            background: #2b2e3b;
            box-shadow: 6px -6px 12px #1c1e26,
                        -6px 6px 12px #3a3e4f;
        }

        /* Custom Scrollbar */
        body::-webkit-scrollbar,
        #chat-box::-webkit-scrollbar {
            width: 8px;
        }

        body::-webkit-scrollbar-track,
        #chat-box::-webkit-scrollbar-track {
            background: #e0e5ec;
            border-radius: 4px;
        }

        body.dark-mode::-webkit-scrollbar-track,
        body.dark-mode #chat-box::-webkit-scrollbar-track {
            background: #2b2e3b;
        }

        body::-webkit-scrollbar-thumb,
        #chat-box::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #6ee7b7, #3b82f6);
            border-radius: 4px;
        }

        body::-webkit-scrollbar-thumb:hover,
        #chat-box::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #3b82f6, #6ee7b7);
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">TDP</div>
        <h1>Chat with Donor</h1>
        <div class="header-links">
            <a href="{{ route('seeker.dashboard') }}">Back to Dashboard</a>
            <a href="{{ route('seeker.donors.index') }}">Back to Donors</a>
            <button class="toggle-btn">Toggle Dark Mode</button>
        </div>
    </header>

    <div class="chat-container">
        <div id="chat-box" data-fetch-url="{{ route('chat.fetch', $timeRequest->id) }}">
            <!-- Messages will load here -->
        </div>

        <form id="chat-form" class="chat-form" action="{{ route('chat.send', $timeRequest->id) }}" method="POST">
            @csrf
            <div class="typing-indicator">Typing...</div>
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
            const typingIndicator = document.querySelector(".typing-indicator");

            let lastMessageCount = 0;
            let typingTimeout;

            function scrollToBottom() {
                chatBox.scrollTop = chatBox.scrollHeight;
            }

            function appendMessage(data, isOwn = false) {
                const div = document.createElement("div");
                div.classList.add("chat-message", isOwn ? "own" : "other");
                div.innerHTML = `<p>${data.message}</p><small>${data.time}</small>`;
                chatBox.appendChild(div);
                scrollToBottom();
            }

            // Typing Indicator
            chatInput.addEventListener("input", () => {
                clearTimeout(typingTimeout);
                if (chatInput.value.trim()) {
                    typingIndicator.classList.add("active");
                    typingTimeout = setTimeout(() => {
                        typingIndicator.classList.remove("active");
                    }, 1000);
                } else {
                    typingIndicator.classList.remove("active");
                }
            });

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
                    typingIndicator.classList.remove("active");
                    appendMessage(data, true);
                })
                .catch(error => console.error('Error sending message:', error));
            });

            setInterval(() => {
                fetch(chatBox.dataset.fetchUrl)
                    .then(res => res.json())
                    .then(messages => {
                        if (messages.length !== lastMessageCount) {
                            messages.slice(lastMessageCount).forEach(msg => appendMessage(msg, msg.is_own));
                            lastMessageCount = messages.length;
                            scrollToBottom();
                        }
                    })
                    .catch(error => console.error('Error fetching messages:', error));
            }, 2000);

            scrollToBottom();
        });
    </script>
</body>
</html>