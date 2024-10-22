<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<style type="text/css">
    .borderwhite {
        border-top-color: #fff !important;
    }

    .box-header>.box-tools {
        display: none;
    }

    .sidebar-collapse #barChart {
        height: 100% !important;
    }

    .sidebar-collapse #lineChart {
        height: 100% !important;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>backend/usertemplate/assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/toastr/toastr.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/charts-c3/plugin.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/main.css">

<div id="wrapper" class="theme-cyan">
      <!-- Page Loader -->
      <div class="page-loader-wrapper">
        <div class="loader">
          <div class="m-t-30">
            <img
              src="<?php echo base_url(); ?>backend/usertemplate/assets/images/logo-icon.svg"
              width="48"
              height="48"
              alt="Iconic"
            />   
          </div>
          <p>Please wait...</p>
        </div>
      </div>

      <!-- Top navbar div start -->
      <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-brand">
            <button type="button" class="btn-toggle-offcanvas">
              <i class="fa fa-bars"></i>
            </button>
            <button type="button" class="btn-toggle-fullwidth">
              <i class="fa fa-bars"></i>
            </button>
            <a href="/">ICONIC</a>
          </div>

          <div class="navbar-right">
            <form id="navbar-search" class="navbar-form search-form">
              <input
                value=""
                class="form-control"
                placeholder="Search here..."
                type="text"
              />
              <button type="button" class="btn btn-default">
                <i class="icon-magnifier"></i>
              </button>
            </form>

            <div id="navbar-menu">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a
                    href="javascript:void(0);"
                    class="dropdown-toggle icon-menu"
                    data-toggle="dropdown"
                  >
                    <i class="fa fa-bell"></i>
                    <span class="notification-dot"></span>
                  </a>
                  <ul class="dropdown-menu notifications">
                    <li class="header">
                      <strong>You have 4 new Notifications</strong>
                    </li>
                    <li>
                      <a href="javascript:void(0);">
                        <div class="media">
                          <div class="media-left">
                            <i class="icon-info text-warning"></i>
                          </div>
                          <div class="media-body">
                            <p class="text">
                              Campaign <strong>Holiday Sale</strong> is nearly
                              reach budget limit.
                            </p>
                            <span class="timestamp">10:00 AM Today</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);">
                        <div class="media">
                          <div class="media-left">
                            <i class="icon-like text-success"></i>
                          </div>
                          <div class="media-body">
                            <p class="text">
                              Your New Campaign <strong>Holiday Sale</strong> is
                              approved.
                            </p>
                            <span class="timestamp">11:30 AM Today</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);">
                        <div class="media">
                          <div class="media-left">
                            <i class="icon-pie-chart text-info"></i>
                          </div>
                          <div class="media-body">
                            <p class="text">
                              Website visits from Twitter is 27% higher than
                              last week.
                            </p>
                            <span class="timestamp">04:00 PM Today</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);">
                        <div class="media">
                          <div class="media-left">
                            <i class="icon-info text-danger"></i>
                          </div>
                          <div class="media-body">
                            <p class="text">
                              Error on website analytics configurations
                            </p>
                            <span class="timestamp">Yesterday</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li class="footer">
                      <a href="javascript:void(0);" class="more"
                        >See all notifications</a
                      >
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="page-login.html" class="icon-menu"
                    ><i class="fa fa-power-off"></i
                  ></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <!-- main left menu -->
      <div id="left-sidebar" class="sidebar">
        <button type="button" class="btn-toggle-offcanvas">
          <i class="fa fa-arrow-left"></i>
        </button>
        <div class="sidebar-scroll">
          <div class="user-account">
            <!-- <img
              src="assets/images/user.png"
              class="rounded-circle user-photo"
              alt="User Profile Picture"
            /> -->
            <img class="user-photo"
              alt="User Profile Picture" src="<?php echo base_url(); ?>uploads/school_content/admin_logo/<?php $this->setting_model->getAdminlogo();?>" alt="<?php echo $this->customlib->getAppName() ?>" />

            <div class="dropdown">
              <span>Welcoe,</span>
              <a
                href="javascript:void(0);"
                class="dropdown-toggle user-name"
                data-toggle="dropdown"
                ><strong>Pamela Petrus</strong></a
              >
              <ul class="dropdown-menu dropdown-menu-right account">
                <li>
                  <a href="page-profile2.html"
                    ><i class="icon-user"></i>My Profile</a
                  >
                </li>
                <li>
                  <a href="app-inbox.html"
                    ><i class="icon-envelope-open"></i>Messages</a
                  >
                </li>
                <li>
                  <a href="javascript:void(0);"
                    ><i class="icon-settings"></i>Settings</a
                  >
                </li>
                <li class="divider"></li>
                <li>
                  <a href="page-login.html"><i class="icon-power"></i>Logout</a>
                </li>
              </ul>
            </div>
            <hr />
            <ul class="row list-unstyled">
              <li class="col-4">
                <small>Sales</small>
                <h6>561</h6>
              </li>
              <li class="col-4">
                <small>Order</small>
                <h6>920</h6>
              </li>
              <li class="col-4">
                <small>Revenue</small>
                <h6>$23B</h6>
              </li>
            </ul>
          </div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#menu">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#Chat"
                ><i class="icon-book-open"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#setting"
                ><i class="icon-settings"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#question"
                ><i class="icon-question"></i
              ></a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content padding-0">
            <div class="tab-pane active" id="menu">
              <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu li_animation_delay">
                  <li class="active">
                    <a href="#Dashboard" class="has-arrow"
                      ><i class="fa fa-dashboard"></i><span>Dashboard</span></a
                    >
                    <ul>
                      <li class="active">
                        <a href="index.html">Analytical</a>
                      </li>
                      <li><a href="h-menu.html">Analytical H-Menu</a></li>
                      <li><a href="index9.html">IoT Dashboard</a></li>
                      <li><a href="index2.html">Demographic</a></li>
                      <li><a href="index6.html">Project Board</a></li>
                      <li><a href="index7.html">Crypto Dashboard</a></li>
                      <li><a href="index8.html">eCommerce</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#App" class="has-arrow"
                      ><i class="fa fa-th-large"></i><span>Ready App</span></a
                    >
                    <ul>
                      <li><a href="app-inbox.html">Inbox</a></li>
                      <li><a href="app-chat.html">Chat</a></li>
                      <li><a href="app-calendar.html">Calendar</a></li>
                      <li><a href="app-contact.html">Contact list</a></li>
                      <li>
                        <a href="app-contact-grid.html"
                          >Contact Card
                          <span class="badge badge-warning float-right"
                            >New</span
                          ></a
                        >
                      </li>
                      <li><a href="app-taskboard.html">Taskboard</a></li>
                      <li>
                        <a href="javascript:void(0);"><span>Blog</span></a>
                        <ul>
                          <li><a href="blog-dashboard.html">Dashboard</a></li>
                          <li><a href="blog-post.html">New Post</a></li>
                          <li><a href="blog-list.html">Blog List</a></li>
                          <li><a href="blog-details.html">Blog Detail</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="javascript:void(0);"
                          ><span>File Manager</span></a
                        >
                        <ul>
                          <li><a href="file-dashboard.html">Dashboard</a></li>
                          <li><a href="file-documents.html">Documents</a></li>
                          <li><a href="file-media.html">Media</a></li>
                          <li><a href="file-images.html">Images</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#Widgets" class="has-arrow"
                      ><i class="fa fa-puzzle-piece"></i><span>Widgets</span></a
                    >
                    <ul>
                      <li><a href="widgets-statistics.html">Statistics</a></li>
                      <li><a href="widgets-data.html">Data</a></li>
                      <li><a href="widgets-chart.html">Chart</a></li>
                      <li><a href="widgets-weather.html">Weather</a></li>
                      <li><a href="widgets-social.html">Social</a></li>
                      <li><a href="widgets-blog.html">Blog</a></li>
                      <li><a href="widgets-ecommerce.html">eCommerce</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#uiElements" class="has-arrow"
                      ><i class="fa fa-diamond"></i><span>UI Elements</span></a
                    >
                    <ul>
                      <li><a href="ui-typography.html">Typography</a></li>
                      <li><a href="ui-tabs.html">Tabs</a></li>
                      <li><a href="ui-buttons.html">Buttons</a></li>
                      <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                      <li><a href="ui-icons.html">Icons</a></li>
                      <li><a href="ui-notifications.html">Notifications</a></li>
                      <li><a href="ui-colors.html">Colors</a></li>
                      <li><a href="ui-dialogs.html">Dialogs</a></li>
                      <li><a href="ui-list-group.html">List Group</a></li>
                      <li><a href="ui-media-object.html">Media Object</a></li>
                      <li><a href="ui-modals.html">Modals</a></li>
                      <li><a href="ui-nestable.html">Nestable</a></li>
                      <li><a href="ui-progressbars.html">Progress Bars</a></li>
                      <li><a href="ui-range-sliders.html">Range Sliders</a></li>
                      <li><a href="ui-treeview.html">Treeview</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#charts" class="has-arrow"
                      ><i class="fa fa-area-chart"></i><span>Charts</span></a
                    >
                    <ul>
                      <li><a href="chart-apex.html">Apex</a></li>
                      <li><a href="chart-c3.html">C3 Charts</a></li>
                      <li><a href="chart-morris.html">Morris</a></li>
                      <li><a href="chart-flot.html">Flot</a></li>
                      <li><a href="chart-chartjs.html">ChartJS</a></li>
                      <li><a href="chart-jquery-knob.html">Jquery Knob</a></li>
                      <li>
                        <a href="chart-sparkline.html">Sparkline Chart</a>
                      </li>
                      <li><a href="chart-peity.html">Peity</a></li>
                      <li><a href="chart-gauges.html">Gauges</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#forms" class="has-arrow"
                      ><i class="fa fa-pencil"></i><span>Forms</span></a
                    >
                    <ul>
                      <li>
                        <a href="forms-validation.html">Form Validation</a>
                      </li>
                      <li>
                        <a href="forms-advanced.html">Advanced Elements</a>
                      </li>
                      <li><a href="forms-basic.html">Basic Elements</a></li>
                      <li><a href="forms-wizard.html">Form Wizard</a></li>
                      <li>
                        <a href="forms-dragdropupload.html"
                          >Drag &amp; Drop Upload</a
                        >
                      </li>
                      <li><a href="forms-cropping.html">Image Cropping</a></li>
                      <li><a href="forms-summernote.html">Summernote</a></li>
                      <li><a href="forms-editors.html">CKEditor</a></li>
                      <li><a href="forms-markdown.html">Markdown</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#Tables" class="has-arrow"
                      ><i class="fa fa-table"></i><span>Tables</span></a
                    >
                    <ul>
                      <li>
                        <a href="table-basic.html"
                          >Tables Example<span
                            class="badge badge-info float-right"
                            >New</span
                          ></a
                        >
                      </li>
                      <li><a href="table-normal.html">Normal Tables</a></li>
                      <li>
                        <a href="table-jquery-datatable.html"
                          >Jquery Datatables</a
                        >
                      </li>
                      <li><a href="table-editable.html">Editable Tables</a></li>
                      <li><a href="table-color.html">Tables Color</a></li>
                      <li>
                        <a href="table-filter.html"
                          >Table Filter
                          <span class="badge badge-info float-right"
                            >New</span
                          ></a
                        >
                      </li>
                      <li>
                        <a href="table-dragger.html"
                          >Table dragger
                          <span class="badge badge-info float-right"
                            >New</span
                          ></a
                        >
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#Authentication" class="has-arrow"
                      ><i class="fa fa-lock"></i><span>Authentication</span></a
                    >
                    <ul>
                      <li><a href="page-login.html">Login</a></li>
                      <li><a href="page-register.html">Register</a></li>
                      <li><a href="page-lockscreen.html">Lockscreen</a></li>
                      <li>
                        <a href="page-forgot-password.html">Forgot Password</a>
                      </li>
                      <li><a href="page-404.html">Page 404</a></li>
                      <li><a href="page-403.html">Page 403</a></li>
                      <li><a href="page-500.html">Page 500</a></li>
                      <li><a href="page-503.html">Page 503</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#Pages" class="has-arrow"
                      ><i class="fa fa-file"></i><span>Extra Pages</span></a
                    >
                    <ul>
                      <li><a href="page-blank.html">Blank Page</a></li>
                      <li>
                        <a href="page-profile.html"
                          >Profile
                          <span class="badge badge-default float-right"
                            >v1</span
                          ></a
                        >
                      </li>
                      <li>
                        <a href="page-profile2.html"
                          >Profile
                          <span class="badge badge-warning float-right"
                            >v2</span
                          ></a
                        >
                      </li>
                      <li>
                        <a href="page-gallery.html"
                          >Image Gallery
                          <span class="badge badge-default float-right"
                            >v1</span
                          ></a
                        >
                      </li>
                      <li>
                        <a href="page-gallery2.html"
                          >Image Gallery
                          <span class="badge badge-warning float-right"
                            >v2</span
                          ></a
                        >
                      </li>
                      <li><a href="page-timeline.html">Timeline</a></li>
                      <li>
                        <a href="page-timeline-h.html">Horizontal Timeline</a>
                      </li>
                      <li><a href="page-pricing.html">Pricing</a></li>
                      <li><a href="page-invoices.html">Invoices</a></li>
                      <li>
                        <a href="page-invoices2.html"
                          >Invoices
                          <span class="badge badge-warning float-right"
                            >v2</span
                          ></a
                        >
                      </li>
                      <li>
                        <a href="page-search-results.html">Search Results</a>
                      </li>
                      <li>
                        <a href="page-helper-class.html">Helper Classes</a>
                      </li>
                      <li><a href="page-teams-board.html">Teams Board</a></li>
                      <li>
                        <a href="page-projects-list.html">Projects List</a>
                      </li>
                      <li><a href="page-maintenance.html">Maintenance</a></li>
                      <li><a href="page-testimonials.html">Testimonials</a></li>
                      <li><a href="page-faq.html">FAQ</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#Maps" class="has-arrow"
                      ><i class="fa fa-map"></i><span>Maps</span></a
                    >
                    <ul>
                      <li><a href="map-google.html">Google Map</a></li>
                      <li><a href="map-yandex.html">Yandex Map</a></li>
                      <li><a href="map-jvectormap.html">jVector Map</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="tab-pane" id="Chat">
              <form>
                <div class="input-group m-b-20">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="icon-magnifier"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search..."
                  />
                </div>
              </form>
              <ul class="right_chat list-unstyled li_animation_delay">
                <li>
                  <a href="javascript:void(0);" class="media">
                    <img
                      class="media-object"
                      src="assets/images/xs/avatar1.jpg"
                      alt=""
                    />
                    <div class="media-body">
                      <span class="name d-flex justify-content-between"
                        >Chris Fox <i class="fa fa-heart-o font-12"></i
                      ></span>
                      <span class="message">chrisfox@gmail.com</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);" class="media">
                    <img
                      class="media-object"
                      src="assets/images/xs/avatar2.jpg"
                      alt=""
                    />
                    <div class="media-body">
                      <span class="name d-flex justify-content-between"
                        >Joge Lucky <i class="fa fa-heart-o font-12"></i
                      ></span>
                      <span class="message">Jogelucky@gmail.com</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);" class="media">
                    <img
                      class="media-object"
                      src="assets/images/xs/avatar3.jpg"
                      alt=""
                    />
                    <div class="media-body">
                      <span class="name d-flex justify-content-between"
                        >Isabella <i class="fa fa-heart-o font-12"></i
                      ></span>
                      <span class="message">Isabella@gmail.com</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);" class="media">
                    <img
                      class="media-object"
                      src="assets/images/xs/avatar4.jpg"
                      alt=""
                    />
                    <div class="media-body">
                      <span class="name d-flex justify-content-between"
                        >Folisise Chosielie <i class="fa fa-heart font-12"></i
                      ></span>
                      <span class="message">FolisiseChosielie@gmail.com</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);" class="media">
                    <img
                      class="media-object"
                      src="assets/images/xs/avatar5.jpg"
                      alt=""
                    />
                    <div class="media-body">
                      <span class="name d-flex justify-content-between"
                        >Alexander <i class="fa fa-heart-o font-12"></i
                      ></span>
                      <span class="message">Alexander@gmail.com</span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
            <div class="tab-pane" id="setting">
              <h6>Choose Skin</h6>
              <ul class="choose-skin list-unstyled">
                <li data-theme="purple"><div class="purple"></div></li>
                <li data-theme="blue"><div class="blue"></div></li>
                <li data-theme="cyan" class="active">
                  <div class="cyan"></div>
                </li>
                <li data-theme="green"><div class="green"></div></li>
                <li data-theme="orange"><div class="orange"></div></li>
                <li data-theme="blush"><div class="blush"></div></li>
                <li data-theme="red"><div class="red"></div></li>
              </ul>

              <ul class="list-unstyled font_setting mt-3">
                <li>
                  <label
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="font"
                      value="font-nunito"
                      checked=""
                    />
                    <span class="custom-control-label">Nunito Google Font</span>
                  </label>
                </li>
                <li>
                  <label
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="font"
                      value="font-ubuntu"
                    />
                    <span class="custom-control-label">Ubuntu Font</span>
                  </label>
                </li>
                <li>
                  <label
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="font"
                      value="font-raleway"
                    />
                    <span class="custom-control-label"
                      >Raleway Google Font</span
                    >
                  </label>
                </li>
                <li>
                  <label
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="font"
                      value="font-IBMplex"
                    />
                    <span class="custom-control-label"
                      >IBM Plex Google Font</span
                    >
                  </label>
                </li>
              </ul>

              <ul class="list-unstyled mt-3">
                <li class="d-flex align-items-center mb-2">
                  <label class="toggle-switch theme-switch">
                    <input type="checkbox" />
                    <span class="toggle-switch-slider"></span>
                  </label>
                  <span class="ml-3">Enable Dark Mode!</span>
                </li>
                <li class="d-flex align-items-center mb-2">
                  <label class="toggle-switch theme-rtl">
                    <input type="checkbox" />
                    <span class="toggle-switch-slider"></span>
                  </label>
                  <span class="ml-3">Enable RTL Mode!</span>
                </li>
                <li class="d-flex align-items-center mb-2">
                  <label class="toggle-switch theme-high-contrast">
                    <input type="checkbox" />
                    <span class="toggle-switch-slider"></span>
                  </label>
                  <span class="ml-3">Enable High Contrast Mode!</span>
                </li>
              </ul>

              <hr />
              <h6>General Settings</h6>
              <ul class="setting-list list-unstyled">
                <li>
                  <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox" checked />
                    <span>Allowed Notifications</span>
                  </label>
                </li>
                <li>
                  <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox" />
                    <span>Offline</span>
                  </label>
                </li>
                <li>
                  <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox" />
                    <span>Location Permission</span>
                  </label>
                </li>
              </ul>

              <a href="#" target="_blank" class="btn btn-block btn-primary"
                >Buy this item</a
              >
              <a
                href="https://themeforest.net/user/wrraptheme/portfolio"
                target="_blank"
                class="btn btn-block btn-secondary"
                >View portfolio</a
              >
            </div>
            <div class="tab-pane" id="question">
              <form>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="icon-magnifier"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search..."
                  />
                </div>
              </form>
              <ul class="list-unstyled question">
                <li class="menu-heading">HOW-TO</li>
                <li>
                  <a href="javascript:void(0);">How to Create Campaign</a>
                </li>
                <li><a href="javascript:void(0);">Boost Your Sales</a></li>
                <li><a href="javascript:void(0);">Website Analytics</a></li>
                <li class="menu-heading">ACCOUNT</li>
                <li><a href="javascript:void(0);">Cearet New Account</a></li>
                <li><a href="javascript:void(0);">Change Password?</a></li>
                <li><a href="javascript:void(0);">Privacy &amp; Policy</a></li>
                <li class="menu-heading">BILLING</li>
                <li><a href="javascript:void(0);">Payment info</a></li>
                <li><a href="javascript:void(0);">Auto-Renewal</a></li>
                <li class="menu-button mt-3">
                  <a href="../docs/index.html" class="btn btn-primary btn-block"
                    >Documentation</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- rightbar icon div -->
      <div class="right_icon_bar">
        <ul>
          <li>
            <a href="app-inbox.html"><i class="fa fa-envelope"></i></a>
          </li>
          <li>
            <a href="app-chat.html"><i class="fa fa-comments"></i></a>
          </li>
          <li>
            <a href="app-calendar.html"><i class="fa fa-calendar"></i></a>
          </li>
          <li>
            <a href="file-dashboard.html"><i class="fa fa-folder"></i></a>
          </li>
          <li>
            <a href="app-contact.html"><i class="fa fa-id-card"></i></a>
          </li>
          <li>
            <a href="blog-list.html"><i class="fa fa-globe"></i></a>
          </li>
          <li>
            <a href="javascript:void(0);"><i class="fa fa-plus"></i></a>
          </li>
          <li>
            <a href="javascript:void(0);" class="right_icon_btn"
              ><i class="fa fa-angle-right"></i
            ></a>
          </li>
        </ul>
      </div>

      <!-- mani page content body part -->
      <div id="main-content">
        <div class="container-fluid">
          <div class="block-header">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <h2>Analytical</h2>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.html"><i class="fa fa-dashboard"></i></a>
                  </li>
                  <li class="breadcrumb-item">Dashboard</li>
                  <li class="breadcrumb-item active">Analytical</li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="d-flex flex-row-reverse">
                  <div class="page_action">
                    <button type="button" class="btn btn-primary">
                      <i class="fa fa-download"></i> Download report
                    </button>
                    <button type="button" class="btn btn-secondary">
                      <i class="fa fa-send"></i> Send report
                    </button>
                  </div>
                  <div class="p-2 d-flex"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row clearfix row-deck">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card number-chart">
                <div class="body">
                  <span class="text-uppercase">New Sessions</span>
                  <h4 class="mb-0 mt-2">
                    22,500 <i class="fa fa-level-up font-12"></i>
                  </h4>
                  <small class="text-muted">Analytics for last week</small>
                </div>
                <div
                  class="sparkline"
                  data-type="line"
                  data-spot-Radius="0"
                  data-offset="90"
                  data-width="100%"
                  data-height="50px"
                  data-line-Width="1"
                  data-line-Color="#39afa6"
                  data-fill-Color="#73cec7"
                >
                  4,1,5,2,7,3,4
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card number-chart">
                <div class="body">
                  <span class="text-uppercase">Goal Completions</span>
                  <h4 class="mb-0 mt-2">1,12,500</h4>
                  <small class="text-muted">Analytics for last week</small>
                </div>
                <div
                  class="sparkline"
                  data-type="line"
                  data-spot-Radius="0"
                  data-offset="90"
                  data-width="100%"
                  data-height="50px"
                  data-line-Width="1"
                  data-line-Color="#ffa901"
                  data-fill-Color="#efc26b"
                >
                  1,4,2,3,6,2
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card number-chart">
                <div class="body">
                  <span class="text-uppercase">TIME ON SITE</span>
                  <h4 class="mb-0 mt-2">1,070</h4>
                  <small class="text-muted">Analytics for last week</small>
                </div>
                <div
                  class="sparkline"
                  data-type="line"
                  data-spot-Radius="0"
                  data-offset="90"
                  data-width="100%"
                  data-height="50px"
                  data-line-Width="1"
                  data-line-Color="#38c172"
                  data-fill-Color="#84d4a6"
                >
                  1,4,2,3,1,5
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card number-chart">
                <div class="body">
                  <span class="text-uppercase">BOUNCE RATE</span>
                  <h4 class="mb-0 mt-2">10K</h4>
                  <small class="text-muted">Analytics for last week</small>
                </div>
                <div
                  class="sparkline"
                  data-type="line"
                  data-spot-Radius="0"
                  data-offset="90"
                  data-width="100%"
                  data-height="50px"
                  data-line-Width="1"
                  data-line-Color="#226fd8"
                  data-fill-Color="#7ea7de"
                >
                  1,3,5,1,4,2
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card top_widget">
                <div class="body">
                  <div class="icon"><i class="fa fa-flag"></i></div>
                  <div class="content">
                    <div class="text mb-2 text-uppercase">Sessions</div>
                    <h4 class="number mb-0">
                      3,251
                      <span class="font-12 text-muted"
                        ><i class="fa fa-level-up"></i> 13%</span
                      >
                    </h4>
                    <small class="text-muted">Analytics for last week</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card top_widget">
                <div class="body">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="content">
                    <div class="text mb-2 text-uppercase">Users</div>
                    <h4 class="number mb-0">
                      25K
                      <span class="font-12 text-muted"
                        ><i class="fa fa-level-down"></i> 7%</span
                      >
                    </h4>
                    <small class="text-muted">Analytics for last week</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card top_widget">
                <div class="body">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="content">
                    <div class="text mb-2 text-uppercase">VISITORS</div>
                    <h4 class="number mb-0">
                      21K
                      <span class="font-12 text-muted"
                        ><i class="fa fa-level-down"></i> 4%</span
                      >
                    </h4>
                    <small class="text-muted">Analytics for last week</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card top_widget">
                <div class="body">
                  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                  <div class="content">
                    <div class="text mb-2 text-uppercase">LIKES</div>
                    <h4 class="number mb-0">
                      53K
                      <span class="font-12 text-muted"
                        ><i class="fa fa-level-up"></i> 15%</span
                      >
                    </h4>
                    <small class="text-muted">Analytics for last week</small>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row clearfix row-deck">
            <div class="col-lg-12">
              <div class="card">
                <div class="header">
                  <h2>Google Analytics Dashboard</h2>
                  <ul class="header-dropdown">
                    <li class="dropdown">
                      <a
                        href="javascript:void(0);"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"
                      ></a>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li>
                          <a href="javascript:void(0);">Another Action</a>
                        </li>
                        <li>
                          <a href="javascript:void(0);">Something else</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <select class="custom-select custom-select-sm">
                        <option>Open this select menu</option>
                        <option value="1">Sessions</option>
                        <option value="2">Users</option>
                        <option selected value="3">Page Views</option>
                        <option value="4">Bounce Rate</option>
                        <option value="5">Location</option>
                        <option value="6">Pages</option>
                        <option value="7">Referrers</option>
                        <option value="8">Searches</option>
                        <option value="9">Technology</option>
                        <option value="10">404 Errors</option>
                      </select>
                    </div>
                    <div class="d-flex">
                      <button
                        type="button"
                        class="btn btn-outline-primary mr-2"
                      >
                        <i class="fa fa-download"></i> Download report
                      </button>
                      <button type="button" class="btn btn-outline-secondary">
                        <i class="fa fa-send"></i> Send report
                      </button>
                    </div>
                  </div>
                  <div
                    id="Google-Analytics-Dashboard"
                    style="height: 230px"
                  ></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row clearfix row-deck">
            <div class="col-lg-4 col-md-12">
              <div class="card">
                <div class="header">
                  <h2>Use by Device</h2>
                  <ul class="header-dropdown">
                    <li class="dropdown">
                      <a
                        href="javascript:void(0);"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"
                      ></a>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li>
                          <a href="javascript:void(0);">Another Action</a>
                        </li>
                        <li>
                          <a href="javascript:void(0);">Something else</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="body">
                  <div id="Use-by-Device" style="height: 16rem"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="card">
                <div class="header">
                  <h2>Use by Audience</h2>
                  <ul class="header-dropdown">
                    <li class="dropdown">
                      <a
                        href="javascript:void(0);"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"
                      ></a>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li>
                          <a href="javascript:void(0);">Another Action</a>
                        </li>
                        <li>
                          <a href="javascript:void(0);">Something else</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="body">
                  <div id="Use-by-Audience" style="height: 16rem"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="card">
                <div class="header">
                  <h2>Use by Browser</h2>
                  <ul class="header-dropdown">
                    <li class="dropdown">
                      <a
                        href="javascript:void(0);"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"
                      ></a>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li>
                          <a href="javascript:void(0);">Another Action</a>
                        </li>
                        <li>
                          <a href="javascript:void(0);">Something else</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="body">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th>Browser</th>
                        <th>Sessions</th>
                        <th>Bounce rate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Chrome</td>
                        <td>23,233 <i class="fa fa-level-up"></i></td>
                        <td>47.12%</td>
                      </tr>
                      <tr>
                        <td>Firefox</td>
                        <td>13,901 <i class="fa fa-level-up"></i></td>
                        <td>33.02%</td>
                      </tr>
                      <tr>
                        <td>Safari</td>
                        <td>3,015 <i class="fa fa-level-up"></i></td>
                        <td>24.12%</td>
                      </tr>
                      <tr>
                        <td>Edge</td>
                        <td>233 <i class="fa fa-level-down"></i></td>
                        <td>17.33%</td>
                      </tr>
                      <tr>
                        <td>Opera</td>
                        <td>821 <i class="fa fa-level-down"></i></td>
                        <td>7.12%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!-- Javascript -->
<script src="<?php echo base_url(); ?>backend/usertemplate/assets/bundles/libscripts.bundle.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/bundles/vendorscripts.bundle.js"></script>

    <!-- page vendor js file -->
    <script src="<?php echo base_url(); ?>backend/usertemplate/toastr/toastr.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/bundles/c3.bundle.js"></script>

    <!-- page js file -->
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/bundles/mainscripts.bundle.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/index.js"></script>
<!-- <script src="<?php echo base_url() ?>backend/js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>backend/js/utils.js"></script> -->
<script type="text/javascript">

    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: [<?php foreach ($incomegraph as $value) { ?>"<?php echo $value['income_category']; ?>", <?php } ?>],
            datasets: [
                {
                    label: "Income",
                    backgroundColor: [<?php $s = 1;
                    foreach ($incomegraph as $value) {
                        ?>"<?php echo incomegraphColors($s++); ?>", <?php
                           if ($s == 8) {
                               $s = 1;
                           }
                    }
                    ?> ],
                    data: [<?php $s = 1;
                    foreach ($incomegraph as $value) {
                        ?><?php echo $value['total']; ?>, <?php } ?>]
                }
            ]
        },
        options: {
            responsive: true,
            circumference: Math.PI,
            rotation: - Math.PI,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
    new Chart(document.getElementById("doughnut-chart1"), {
        type: 'doughnut',
        data: {
            labels: [<?php foreach ($expensegraph as $value) { ?>"<?php echo $value['exp_category']; ?>", <?php } ?>],
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: [<?php $ss = 1;
                    foreach ($expensegraph as $value) {
                        ?>"<?php echo expensegraphColors($ss++); ?>", <?php
                           if ($ss == 8) {
                               $ss = 1;
                           }
                    }
                    ?>],
                    data: [<?php foreach ($expensegraph as $value) { ?><?php echo $value['total']; ?>, <?php } ?>]
                }
            ]
        },
        options: {
            responsive: true,
            circumference: Math.PI,
            rotation: - Math.PI,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
    <?php
    if (($this->module_lib->hasActive('fees_collection')) || ($this->module_lib->hasActive('expense'))) {
        ?>
                                        $(function () {
                                            var areaChartOptions = {
                                                showScale: true,
                                                scaleShowGridLines: false,
                                                scaleGridLineColor: "rgba(0,0,0,.05)",
                                                scaleGridLineWidth: 1,
                                                scaleShowHorizontalLines: true,
                                                scaleShowVerticalLines: true,
                                                bezierCurve: true,
                                                bezierCurveTension: 0.3,
                                                pointDot: false,
                                                pointDotRadius: 4,
                                                pointDotStrokeWidth: 1,
                                                pointHitDetectionRadius: 20,
                                                datasetStroke: true,
                                                datasetStrokeWidth: 2,
                                                datasetFill: true,
                                                maintainAspectRatio: true,
                                                responsive: true
                                            };
                                            var bar_chart = "<?php echo $bar_chart ?>";
                                            var line_chart = "<?php echo $line_chart ?>";
                                            if (line_chart) {


                                                var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
                                                var lineChart = new Chart(lineChartCanvas);
                                                var lineChartOptions = areaChartOptions;
                                                lineChartOptions.datasetFill = false;
                                                var yearly_collection_array = <?php echo json_encode($yearly_collection) ?>;
                                                var yearly_expense_array = <?php echo json_encode($yearly_expense) ?>;
                                                var total_month = <?php echo json_encode($total_month) ?>;
                                                var areaChartData_expense_Income = {
                                                    labels: total_month,
                                                    datasets: [
                                                        {
                                                            label: "Expense",
                                                            fillColor: "rgba(215, 44, 44, 0.7)",
                                                            strokeColor: "rgba(215, 44, 44, 0.7)",
                                                            pointColor: "rgba(233, 30, 99, 0.9)",
                                                            pointStrokeColor: "#c1c7d1",
                                                            pointHighlightFill: "#fff",
                                                            pointHighlightStroke: "rgba(220,220,220,1)",
                                                            data: yearly_expense_array
                                                        },
                                                        {
                                                            label: "Collection",
                                                            fillColor: "rgba(102, 170, 24, 0.6)",
                                                            strokeColor: "rgba(102, 170, 24, 0.6)",
                                                            pointColor: "rgba(102, 170, 24, 0.9)",
                                                            pointStrokeColor: "rgba(102, 170, 24, 0.6)",
                                                            pointHighlightFill: "#fff",
                                                            pointHighlightStroke: "rgba(60,141,188,1)",
                                                            data: yearly_collection_array
                                                        }
                                                    ]
                                                };
                                                lineChart.Line(areaChartData_expense_Income, lineChartOptions);
                                            }

                                            var current_month_days = <?php echo json_encode($current_month_days) ?>;
                                            var days_collection = <?php echo json_encode($days_collection) ?>;
                                            var days_expense = <?php echo json_encode($days_expense) ?>;
                                            var areaChartData_classAttendence = {
                                                labels: current_month_days,
                                                datasets: [
                                                    {
                                                        label: "Electronics",
                                                        fillColor: "rgba(102, 170, 24, 0.6)",
                                                        strokeColor: "rgba(102, 170, 24, 0.6)",
                                                        pointColor: "rgba(102, 170, 24, 0.6)",
                                                        pointStrokeColor: "#c1c7d1",
                                                        pointHighlightFill: "#fff",
                                                        pointHighlightStroke: "rgba(220,220,220,1)",
                                                        data: days_collection
                                                    },
                                                    {
                                                        label: "Digital Goods",
                                                        fillColor: "rgba(233, 30, 99, 0.9)",
                                                        strokeColor: "rgba(233, 30, 99, 0.9)",
                                                        pointColor: "rgba(233, 30, 99, 0.9)",
                                                        pointStrokeColor: "rgba(233, 30, 99, 0.9)",
                                                        pointHighlightFill: "rgba(233, 30, 99, 0.9)",
                                                        pointHighlightStroke: "rgba(60,141,188,1)",
                                                        data: days_expense
                                                    }
                                                ]
                                            };
                                            if (bar_chart) {
                                                var barChartCanvas = $("#barChart").get(0).getContext("2d");
                                                var barChart = new Chart(barChartCanvas);
                                                var barChartData = areaChartData_classAttendence;
                                                barChartData.datasets[1].fillColor = "rgba(233, 30, 99, 0.9)";
                                                barChartData.datasets[1].strokeColor = "rgba(233, 30, 99, 0.9)";
                                                barChartData.datasets[1].pointColor = "rgba(233, 30, 99, 0.9)";
                                                var barChartOptions = {
                                                    scaleBeginAtZero: true,
                                                    scaleShowGridLines: true,
                                                    scaleGridLineColor: "rgba(0,0,0,.05)",
                                                    scaleGridLineWidth: 1,
                                                    scaleShowHorizontalLines: false,
                                                    scaleShowVerticalLines: false,
                                                    barShowStroke: true,
                                                    barStrokeWidth: 2,
                                                    barValueSpacing: 5,
                                                    barDatasetSpacing: 1,
                                                    responsive: true,
                                                    maintainAspectRatio: true
                                                };
                                                barChartOptions.datasetFill = false;
                                                barChart.Bar(barChartData, barChartOptions);
                                            }
                                        });
                                        <?php
    }
    ?>


    $(document).ready(function () {

        $(document).on('click', '.close_notice', function () {
            var data = $(this).data();
            $.ajax({
                type: "POST",
                url: base_url + "admin/notification/read",
                data: { 'notice': data.noticeid },
                dataType: "json",
                success: function (data) {
                    if (data.status == "fail") {

                        errorMsg(data.msg);
                    } else {
                        successMsg(data.msg);
                    }

                }
            });
        });
    });
</script>