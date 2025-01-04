<?php
    require_once 'contacts.php';
    require_once 'projects.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $contact = new Contacts();
        $result = $contact->insert($name, $email, $subject, $message);

        if ($result == "Success") {
        ?>
        <script>
            alert("Thank you for contacting me. I will get back to you as soon as possible!");
        </script>
        <?php
        } else {
        $error = $result;
        }
    }

    $project = new Projects();
    $result = $project->fetchProjects();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

  <title>My Portfolio</title>
</head>
<body>
    <header>
        <nav>
            <div class="left">
            <a href="/">Brook Geta</a>
            </div>

            <div class="right">
            <a href="http://github.com" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-github"></i>
                <span>Github</span>
            </a>
            
            <a href="http://linkedin.com" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-linkedin"></i>
                <span>Linkedin</span>
            </a>
            
            <a href="mailto:fanuderbe@gmail.com">
                <i class="fa-solid fa-envelope"></i>
                <span>Email</span>
            </a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-text">
                <h2>Hi, I'm Brook Geta</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Nam veritatis et expedita? Temporibus, repudiandae commodi?
                    Recusandae vel quod voluptatem totam, saepe eaque facilis!</p>

                <div class="links">
                <a href="#skills">
                    <i class="fa-solid fa-code"></i>
                    <span>Skills</span>
                </a>
                
                <a href="#testimony">
                    <i class="fa-solid fa-pen"></i>
                    <span>Testimony</span>
                </a>
                
                <a href="#contact">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Contact</span>
                </a>
                </div>
            </div>
        </section>
        <section id="skills" class="skills">
            <h2>Skills</h2>
            <div class="text">
                "I am skilled in multiple programming languages, including HTML, C#, and JavaScript."
            </div>

            <div class="cells">
                <div class="cell">
                <img src="html.jpg" alt="html logo">
                <span>HTML</span>
                </div>
                
                <div class="cell">
                <img src="css.jpg" alt="css logo">
                <span>CSS</span>
                </div>
                
                <div class="cell">
                <img src="js.jpg" alt="javascript logo">
                <span>JavaScript</span>
                </div>
            </div>
        </section>
        <section id="projects" class="projects">
            <div class="container">
                <h2>My Projects</h2>
                <div class="project-list">
                    <?php
                        foreach ($result as $row) {
                            echo "
                            <div class='project-card'>
                                <h3>{$row['title']}</h3>
                                <p>{$row['description']}</p>
                            </div>";
                        }
                    ?>
                </div>
            </div>
        </section>
        <section class="contact">
            <div class="container">
                <h1>Contact Me</h1>
                <form method="POST">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" id="subject">
                    <label for="message">Message</label>
                    <textarea name="message" cols="30" rows="10"></textarea>
                    <input type="submit" value="Send" name="submit">
                </form>
            </div>
        </section>
    </main>
</body>
</html>