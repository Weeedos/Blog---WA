<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Blog</title>
  <style>
    #heading,
    #subheading,
    #content {
      display: none;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/home">Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-item nav-link <?= $_SESSION["site"] === "/views/index.php" ? "active" : "" ?>"
              href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link <?= $_SESSION["site"] === "/views/index.php" ? "active" : "" ?>"
              href="/blog">Blog</a>
          </li>
          <?php if (isset($_SESSION["authenticated"])) { ?>
            <li class="nav-item">
              <a class="nav-item nav-link" href="/logout">Logout</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-item nav-link <?= $_SESSION["site"] === "/views/login.php" ? "active" : "" ?>"
                href="/login">Login</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>

  </header>

  <main class="container mt-4">
    <h1 id="heading">Welcome to my blog!</h1>

    <h2 id="subheading">About us</h2>
    <p id="content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid impedit adipisci facere odio, illo
      cumque, distinctio, ullam maxime culpa eos numquam temporibus. Repudiandae, ratione optio? Iste repellat nisi fuga
      natus?
      Ex cupiditate, nulla iure deleniti necessitatibus temporibus aperiam illo corporis reprehenderit eveniet
      distinctio saepe quae veniam labore ad veritatis beatae tempora, dolores natus placeat libero aliquam ipsa? Iste,
      enim voluptate?
      Minus aliquam eius dignissimos, magni impedit, quasi illum nemo ex, quia harum qui magnam dolor illo nulla? Dolor,
      provident. Quis ut id voluptates, ipsam voluptatem sit est reprehenderit iusto distinctio.
      Mollitia incidunt fugiat nihil quam temporibus deserunt voluptate possimus accusamus tenetur totam maiores harum
      ad quis omnis repellat qui quos, nostrum vel voluptas laboriosam et recusandae, facere, minus nesciunt. Alias!
      Quos exercitationem expedita natus sunt fugit dolore debitis officiis non magnam, aspernatur nihil nobis?
      Repudiandae, aperiam blanditiis explicabo ex quam adipisci cum nostrum temporibus reiciendis dolore distinctio
      iste deserunt consectetur!
      Nihil alias officia corporis porro similique odio vitae, perspiciatis sapiente asperiores. Repellendus, commodi
      libero! Animi debitis quae, sint impedit qui voluptatem nisi voluptas, explicabo similique sapiente vel numquam
      placeat neque!
      Odio unde, sapiente veniam voluptate, hic earum delectus ab, labore a magnam nesciunt accusantium reprehenderit
      voluptas expedita dolorum debitis qui numquam? Provident accusamus ad quos. Quos repellat sequi impedit
      blanditiis?
      Perspiciatis a minima libero commodi, obcaecati aliquam necessitatibus officiis blanditiis nulla qui iste dicta
      sed repellat omnis? Blanditiis explicabo, quidem quas similique autem animi voluptatum placeat veniam. Inventore,
      consectetur sunt!
      Excepturi eos, dolores ipsam dolorum consectetur praesentium enim, id perferendis molestias harum, quis alias
      doloremque asperiores? Omnis sint, dignissimos corporis labore ipsum totam, nulla aliquid numquam, minima suscipit
      recusandae fugit!
      Laboriosam hic animi aut, harum maiores culpa fuga dicta doloribus ullam? Temporibus dolore, vel odit reiciendis
      praesentium excepturi quisquam beatae dolores soluta! Molestiae ab minus voluptatibus ipsa, autem aspernatur
      tempora!</p>
  </main>

  <footer class="mt-4 text-center">
    <p>&copy; 2023 Vít Vosol. All rights reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#heading").fadeIn(1500);
      $("#subheading, #content").slideDown(1000);
    });
  </script>
</body>

</html>