<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Chat with Donor</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --bg: #ecf0f3;
            --text: #34495e;
            --shadow-dark: #a3b1c6;
            --shadow-light: #ffffff;
            --accent-blue: #007bff;
            --accent-pink: #ff0080;
            --accent-green: #28a745;
            --card-gradient-blue: linear-gradient(135deg, #4facfe, #00f2fe);
            --card-gradient-pink: linear-gradient(135deg, #f093fb, #f5576c);
            --card-gradient-green: linear-gradient(135deg, #a1c4fd, #c2e9fb);
            --card-text-light: #ffffff;
            --navbar-gradient: linear-gradient(90deg, #ecf0f3, #e0e5ec);
            --header-text-gradient: linear-gradient(90deg, #34495e, #5a6e81);
        }

        body.dark-mode {
            --bg: #1e1e2a;
            --text: #f3f3f3;
            --shadow-dark: #151520;
            --shadow-light: #2a2a3a;
            --accent-blue: #60a5fa;
            --accent-pink: #ff80a0;
            --accent-green: #90ee90;
            --card-gradient-blue: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            --card-gradient-pink: linear-gradient(135deg, #ee9ca7, #ffdde1);
            --card-gradient-green: linear-gradient(135deg, #a1c4fd, #c2e9fb);
            --card-text-light: #ffffff;
            --navbar-gradient: linear-gradient(90deg, #1e1e2a, #2c2c3a);
            --header-text-gradient: linear-gradient(90deg, #f3f3f3, #d3d3d3);
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            transition: background 0.5s ease-in-out, color 0.5s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            overflow-x: hidden;
        }

        header {
            width: 100%;
            padding: 20px;
            background: var(--navbar-gradient);
            text-align: center;
            box-shadow: 5px 5px 10px var(--shadow-dark),
                        -5px -5px 10px var(--shadow-light);
            border-radius: 0 0 20px 20px;
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
            font-family: 'Orbitron', sans-serif;
            background: var(--header-text-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }

        .chat-container {
            width: 90%;
            max-width: 700px;
            padding: 20px;
            background: var(--bg);
            border-radius: 25px;
            box-shadow: 15px 15px 30px var(--shadow-dark),
                        -15px -15px 30px var(--shadow-light);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        #chat-box {
            height: 400px;
            overflow-y: auto;
            padding: 15px;
            border-radius: 15px;
            background: #f8f9fa;
            box-shadow: inset 5px 5px 10px var(--shadow-dark),
                        inset -5px -5px 10px var(--shadow-light);
            display: flex;
            flex-direction: column;
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
            background: #d1e7dd;
            align-self: flex-end;
        }

        .chat-message.other {
            background: #e2e3e5;
            align-self: flex-start;
        }

        .chat-message small {
            display: block;
            font-size: 0.75rem;
            color: #666;
            margin-top: 3px;
        }

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
            box-shadow: inset 3px 3px 7px var(--shadow-dark),
                        inset -3px -3px 7px var(--shadow-light);
        }

        .btn {
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: var(--text);
            background: var(--bg);
            border: none;
            border-radius: 15px;
            cursor: pointer;
            box-shadow: 5px 5px 10px var(--shadow-dark),
                        -5px -5px 10px var(--shadow-light);
            transition: all 0.2s ease-in-out;
        }

        .btn:hover {
            box-shadow: inset 3px 3px 7px var(--shadow-dark),
                        inset -3px -3px 7px var(--shadow-light);
            color: var(--accent-blue);
        }

        footer {
            margin-top: auto;
            padding: 15px;
            font-size: 0.9rem;
            color: var(--text);
            background: var(--navbar-gradient);
            width: 100%;
            text-align: center;
            border-radius: 20px 20px 0 0;
            box-shadow: 5px -5px 10px var(--shadow-dark),
                        -5px 5px 10px var(--shadow-light);
        }
    </style>
</head>
<body>
  <header>
    <h1>Chat with Donor</h1>
  </header>

  <div class="chat-container">
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
    document.addEventListener("DOMContentLoaded", function () {
        const chatForm = document.getElementById("chat-form");
        const chatInput = document.getElementById("chat-input");
        const chatBox = document.getElementById("chat-box");

        let lastMessageCount = 0;

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
                        scrollToBottom();
                    }
                });
        }, 2000);

        scrollToBottom();
    });
  </script>
</body>
</html>