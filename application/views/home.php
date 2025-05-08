<!-- home.php -->
<button class="delete-all-btn">Delete All</button>
<div class="job-listing">
  <?php
  $jobs = [
    ["title" => "Programmer", "company" => "PT. Listrik Ind", "location" => "Jakarta"],
    ["title" => "Data Analyst", "company" => "PT. Listrik Ind", "location" => "Jakarta"],
    ["title" => "Data Engineer", "company" => "PT. Listrik Ind", "location" => "Jakarta"]
  ];

  foreach ($jobs as $job) {
    echo "<div class='job-item'>";

    echo "<div class='job-icon'>
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
              <path fill='currentColor' d='M10 3h8l-4 6h4L6 21l4-9H6z'/>
            </svg>
          </div>";

    echo "<div class='job-details'>
            <h2>{$job['title']}</h2>
            <p>{$job['company']}</p>
            <p>{$job['location']}</p>
          </div>";

    echo "<div class='job-actions'>
            <button class='icon-button'>
              <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                <path fill='currentColor' d='M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z'/>
                <circle cx='12' cy='12' r='2.5' fill='currentColor'/>
              </svg>
            </button>
            <button class='icon-button'>
              <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                <path fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                  d='M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3'/>
              </svg>
            </button>
          </div>";

    echo "</div>";
  }
  ?>
</div>

<style>
  .delete-all-btn {
    background-color: red;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-bottom: 20px;
    cursor: pointer;
    font-weight: bold;
    border-radius: 6px;
    margin-top: 40px;
  }

  .job-item {
    display: flex;
    align-items: center;
    border: 1px solid #000;
    padding: 10px 15px;
    border-radius: 10px;
    margin-bottom: 10px;
    justify-content: space-between;
  }

  .job-icon svg {
    width: 24px;
    height: 24px;
  }

  .job-icon {
    margin-right: 15px;
  }

  .job-details {
    flex: 1;
  }

  .job-details h2 {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
  }

  .job-details p {
    margin: 2px 0;
    font-size: 14px;
  }

  .job-actions {
    display: flex;
    gap: 10px;
  }

  .icon-button {
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px;
  }

  .icon-button svg {
    width: 20px;
    height: 20px;
  }
</style>
