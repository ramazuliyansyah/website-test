<?php
// --- PHP Routing and Logic ---

// Set the default page to 'home'
$currentPage = isset($_GET['page']) ? $_GET['page'] : 'home';

// Function to determine the content title
function getTitle($page) {
    switch ($page) {
        case 'sports': return 'Explore Sports';
        case 'about': return 'About Us';
        case 'contact': return 'Contact Us';
        case 'home':
        default: return 'Dashboard & Home';
    }
}

// Function to render the main content area based on the current page
function renderContent($page) {
    echo '<div class="content-body">';
    switch ($page) {
        case 'sports':
            echo '
                <h2>Popular Sports</h2>
                <p>From the stadium lights to the quiet concentration of the golf course, sports capture the human spirit. Here are a few examples of popular sports:</p>
                <div class="card-grid">
                    <div class="card">
                        <h3>Football (Soccer)</h3>
                        <p>The world\'s most popular sport, known for its dynamic play and massive international tournaments.</p>
                        <span class="icon">&#9917;</span>
                    </div>
                    <div class="card">
                        <h3>Basketball</h3>
                        <p>A fast-paced, high-scoring game requiring agility and precise shooting, popular globally.</p>
                        <span class="icon">&#127936;</span>
                    </div>
                    <div class="card">
                        <h3>Tennis</h3>
                        <p>An elegant racquet sport played by individuals or pairs, emphasizing strategy and stamina.</p>
                        <span class="icon">&#127934;</span>
                    </div>
                    <div class="card">
                        <h3>Athletics</h3>
                        <p>The umbrella term for track and field events, showcasing speed, strength, and endurance.</p>
                        <span class="icon">&#127939;</span>
                    </div>
                </div>
            ';
            break;

        case 'about':
            echo '
                <h2>Our Mission</h2>
                <p>We are dedicated to celebrating the world of sports, sharing insightful statistics, historical moments, and the stories of athletes who inspire us.</p>
                <p>Our platform aims to be a reliable source for sports enthusiasts, fostering a community built on passion and respect for the game.</p>
                <h3>Our Team</h3>
                <ul class="team-list">
                    <li>Anna K. - Founder & Editor-in-Chief</li>
                    <li>Ben S. - Content Strategy & Analytics</li>
                    <li>Chloe D. - Community Manager</li>
                </ul>
            ';
            break;

        case 'contact':
            echo '
                <h2>Get in Touch</h2>
                <p>We\'d love to hear from you. Whether you have feedback, partnership inquiries, or a burning sports question, feel free to reach out.</p>
                <form action="#" method="POST" class="contact-form">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    
                    <button type="submit">Send Message</button>
                    
                    <p class="contact-info">
                        Or email us directly: <a href="mailto:info@sportshub.com">info@sportshub.com</a><br>
                        Phone: +1 (555) 123-4567
                    </p>
                </form>
            ';
            break;

        case 'home':
        default:
            echo '
                <h1 class="welcome-heading">Welcome to the Sports Dashboard!</h1>
                <p class="intro-text">Your central hub for all things sports. Explore the latest news, statistics, and highlights from around the globe.</p>
                <div class="highlight-box">
                    <h3>Today\'s Focus</h3>
                    <p>The latest scores from the Basketball League and an analysis of the upcoming International Football Cup qualifiers.</p>
                    <a href="?page=sports" class="button-link">View Featured Sports &rarr;</a>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">200+</span>
                        <span class="stat-label">Events Covered</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">5M</span>
                        <span class="stat-label">Global Fans</span>
                    </div>
                </div>
            ';
            break;
    }
    echo '</div>'; // End content-body
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Hub | <?php echo getTitle($currentPage); ?></title>
    
    <!-- --- CSS Styling --- -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        
        :root {
            --primary-color: #3b82f6; /* Blue 500 */
            --secondary-color: #10b981; /* Emerald 500 */
            --bg-color: #f3f4f6; /* Gray 100 */
            --text-color: #1f2937; /* Gray 800 */
            --card-bg: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* --- Header & Navigation --- */
        .header {
            background-color: var(--card-bg);
            box-shadow: var(--shadow);
            padding: 15px 0;
            margin-bottom: 30px;
        }
        
        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav ul {
            list-style: none;
            display: flex;
        }

        .nav ul li {
            margin-left: 25px;
        }

        .nav ul li a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .nav ul li a:hover,
        .nav ul li a.active {
            color: var(--card-bg);
            background-color: var(--primary-color);
        }
        
        .nav ul li a.active {
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.4);
        }

        /* --- Main Content Layout --- */
        .main-content {
            background-color: var(--card-bg);
            padding: 40px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            min-height: 60vh;
        }

        .content-body h2 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 15px;
            border-bottom: 2px solid var(--bg-color);
            padding-bottom: 10px;
        }

        .content-body p {
            margin-bottom: 20px;
            color: #4b5563; /* Gray 600 */
        }

        /* --- Home Page Specific Styles --- */
        .welcome-heading {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .intro-text {
            font-size: 1.1rem;
            margin-bottom: 30px;
            color: #6b7280; /* Gray 500 */
        }

        .highlight-box {
            background-color: #eff6ff; /* Blue 50 */
            border-left: 5px solid var(--primary-color);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .highlight-box h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .button-link {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 15px;
            transition: background-color 0.3s;
        }
        
        .button-link:hover {
            background-color: #059669; /* Emerald 600 */
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .stat-item {
            background-color: var(--bg-color);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            border: 1px solid #e5e7eb;
        }
        
        .stat-number {
            display: block;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .stat-label {
            display: block;
            font-size: 0.9rem;
            color: #6b7280;
            margin-top: 5px;
        }


        /* --- Sports Page Specific Styles --- */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: #f9fafb; /* Gray 50 */
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            text-align: center;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .card .icon {
            font-size: 3rem;
            display: block;
            margin: 10px 0 15px;
        }

        /* --- About Page Specific Styles --- */
        .team-list {
            list-style: disc;
            margin-left: 20px;
            padding-left: 5px;
            color: #4b5563;
        }
        
        .team-list li {
            margin-bottom: 8px;
            font-weight: 600;
        }

        /* --- Contact Page Specific Styles --- */
        .contact-form label {
            display: block;
            font-weight: 600;
            margin-top: 15px;
            margin-bottom: 5px;
            color: var(--text-color);
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db; /* Gray 300 */
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        
        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .contact-form button {
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s, transform 0.1s;
        }
        
        .contact-form button:hover {
            background-color: #2563eb; /* Blue 600 */
        }

        .contact-info {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px dashed #d1d5db;
        }
        
        .contact-info a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        /* --- Footer --- */
        .footer {
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
            color: #6b7280; /* Gray 500 */
            border-top: 1px solid #e5e7eb;
        }
        
        /* --- Responsive Design --- */
        @media (max-width: 768px) {
            .nav-content {
                flex-direction: column;
                text-align: center;
            }
            
            .nav ul {
                margin-top: 15px;
                padding-top: 10px;
                border-top: 1px solid #e5e7eb;
            }

            .nav ul li {
                margin: 0 10px;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .welcome-heading {
                font-size: 2rem;
            }
            
            .content-body h2 {
                font-size: 1.5rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Header & Navigation -->
    <header class="header">
        <div class="container nav-content">
            <a href="?page=home" class="logo">Sports Hub</a>
            <nav class="nav">
                <ul>
                    <li><a href="?page=home" class="<?php echo ($currentPage == 'home' ? 'active' : ''); ?>">Dashboard/Home</a></li>
                    <li><a href="?page=sports" class="<?php echo ($currentPage == 'sports' ? 'active' : ''); ?>">Sports</a></li>
                    <li><a href="?page=about" class="<?php echo ($currentPage == 'about' ? 'active' : ''); ?>">About Us</a></li>
                    <li><a href="?page=contact" class="<?php echo ($currentPage == 'contact' ? 'active' : ''); ?>">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <div class="main-content">
            <?php renderContent($currentPage); ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            &copy; <?php echo date("Y"); ?> Sports Hub. All rights reserved.
        </div>
    </footer>

</body>
</html>