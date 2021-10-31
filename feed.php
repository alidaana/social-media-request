<?php
  session_start();
   $username =$_SESSION['username'];
   $user_id = $_SESSION['user_id'];

   
?>

<html>

<head>
  <!-- icons
        ================================================== -->
  <link rel="stylesheet" href="assets/css/icons.css" />

  <!-- CSS 
        ================================================== -->

  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/tailwind.css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>
  <div id="wrapper" class="">
    <div class="sidebar">
      <div class="
            sidebar_header
            border-b border-gray-200
            from-gray-100
            to-gray-50
            bg-gradient-to-t
            uk-visible@s
          ">
        <a href="#"> </a>
        <!-- btn night mode -->
        <a href="#" id="night-mode" class="btn-night-mode" data-tippy-placement="left" data-tippy=""
          data-original-title="Switch to dark mode"></a>
      </div>

      <div class="
            border-b border-gray-20
            flex
            justify-between
            items-center
            p-3
            pl-5
            relative
            uk-hidden@s
          ">
        <h3 class="text-xl">Navigation</h3>
        <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: sidebar-active"></span>
      </div>
      <!-- user info -->
      <div class="sidebar_inner" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: -5px -13px">
          <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
          </div>
          <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: -17px">
              <div class="simplebar-content" style="
                    padding: 5px 13px;
                    height: 100%;
                    overflow: scroll hidden;
                  ">
                <div class="flex flex-col items-center my-6 uk-visible@s">
                  <div class="
                        bg-gradient-to-tr
                        from-yellow-600
                        to-pink-600
                        p-1
                        rounded-full
                        transition
                        m-0.5
                        mr-2
                        w-24
                        h-24
                      ">
                    <img src="assets/images/avatars/avatar-2.jpg" class="
                          bg-gray-200
                          border-4 border-white
                          rounded-full
                          w-full
                          h-full
                        " />
                  </div class="text-xl font-medium capitalize mt-4 uk-link-reset">

                  <span><?php echo $username;?></span>

                  <div class="
                        flex
                        justify-around
                        w-full
                        items-center
                        text-center
                        uk-link-reset
                        text-gray-800
                        mt-6
                      ">

                    <div>
                      <a href="#">
                        <strong>Following</strong>
                        <div>###</div>
                      </a>
                    </div>
                    <div>
                      <a href="#">
                        <strong>Followers</strong>
                        <div>###</div>
                      </a>
                    </div>
                  </div>
                </div>

                <hr class="-mx-4 -mt-1 uk-visible@s" />
                <ul>
                  <li>
                    <a href="#" id="update">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                      <span> My Profile </span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn" id="friends">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                      <span> Friends </span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn" id="friend_requests">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                      <span> Friend Requests </span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn" id="notifications">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                      <span> Notificatios </span>
                    </a>
                  </li>
                  <li>
                    <a href="php/logout.php">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                      </svg>
                      <span> Logout </span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="simplebar-placeholder" style="width: 303px; height: 909px"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: visible">
          <div class="simplebar-scrollbar" style="
                transform: translate3d(0px, 0px, 0px);
                visibility: visible;
                width: 297px;
              "></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden">
          <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden"></div>
        </div>
      </div>
    </div>

    <div class="main_content">
      <header>
        <div class="header_inner">
          <div class="left-side">

            <div class="triger" uk-toggle="target: #wrapper ; cls: sidebar-active">
              <i class="uil-bars"></i>
            </div>

            <div class="header_search">
              <input id="search_bar" type="text" placeholder="Search for friends.." />
              <div class="icon-search">
                <button id="search_button" href="">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="right-side lg:pr-4">
            <a href="#" class="header-links-item uk-open" aria-expanded="true">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
              </svg>
            </a>
          </div>
        </div>
      </header>

      <div class="container m-auto">
        <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">
          <!-- left sidebar-->
          <div class="space-y-5 flex-shrink-0 lg:w-7/12" id="user">
            <!-- post 1-->


          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- NIGHT MODE CAME WITH THE TEMPLATE -->
  <script>
    (function (window, document, undefined) {
      "use strict";
      if (!("localStorage" in window)) return;
      var nightMode = localStorage.getItem("gmtNightMode");
      if (nightMode) {
        document.documentElement.className += " dark";
      }
    })(window, document);

    (function (window, document, undefined) {
      "use strict";

      // Feature test
      if (!("localStorage" in window)) return;

      // Get our newly insert toggle
      var nightMode = document.querySelector("#night-mode");
      if (!nightMode) return;

      // When clicked, toggle night mode on or off
      nightMode.addEventListener(
        "click",
        function (event) {
          event.preventDefault();
          document.documentElement.classList.toggle("dark");
          if (document.documentElement.classList.contains("dark")) {
            localStorage.setItem("gmtNightMode", true);
            return;
          }
          localStorage.removeItem("gmtNightMode");
        },
        false
      );
    })(window, document);
  </script>

  <!-- Scripts
    ================================================== -->
  <script src="assets/js/tippy.all.min.js"></script>
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/uikit.js"></script>
  <script src="assets/js/simplebar.js"></script>
  <script src="assets/js/custom.js"></script>


 <!-- SEARCHING FOR PEOPLE
      ============================================================================================================================== -->
  <script src="js/searching.js"></script>

 <!-- FRIEND REQUESTS
      ============================================================================================================================== -->
  <script src="js/sendFriendRequest.js"></script>

 <!-- Blocking someone
      ============================================================================================================================== -->
  <script src="js/block.js"></script>


 <!-- GETTING NOTIFICATIONS
      ============================================================================================================================== -->
<script src="js/getNotifications.js"></script>

 <!-- GETTING FRIEND REQUESTS
      ============================================================================================================================== -->
<script src="js/friendRequests.js"></script>


 <!-- GETTING FRIENDS/REMOVING
      ============================================================================================================================== -->
<script src="js/get-removeFriends.js"></script>

<!-- UPDATE PROFILE
      ============================================================================================================================== -->
<script src="js/update.js"></script>

</body>

</html>