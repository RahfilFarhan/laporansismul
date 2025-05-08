<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
</main>

  <footer class="page-footer light-blue darken-4">
    <div class="footer-copyright">
      <div class="container">
        <small>
          Copyright © <?= date("Y"); ?> Loker.ID All rights reserved.
        </small>
      </div>
    </div>
  </footer>

  <script type="text/javascript">
    var element = document.querySelector('.sidenav');
    var instance = M.Sidenav.init(element);
  </script>

  <style media="screen">
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    .page-footer {
      padding: 10px 0 !important;
    }

    main {
      flex: 1 0 auto;
    }
  </style>
  </body>

  </html>