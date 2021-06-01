@include('layouts.header')

   <!-- NAVIGATION -->
   <nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li><a href=" {{ url('/') }} ">Home</a></li>
                <li><a href=" {{ url('/store') }} ">Shop</a></li>
                <li><a href="{{ url('/about') }} ">About us</a></li>
                <li><a href="{{ url('/blog') }} ">Blog</a></li>
                <li><a href="{{ url('/contact') }} ">Contact Us</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href=" {{ url('/') }} ">Home</a></li>
                    <li class="active">My profile</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!---===== agents container====== ---->
<div class="agents-container">
    <div class="container">
        <div class="row agent-contents ">
            <div class="col-lg-4 col-md-12 col-sm-12 ">
                <div class="agent-detail-img">
                    <img src="Images/{{$user->avatar}}  " alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-12  col-sm-12">
                <div class="agentDescription">
                    <div class="tabs">
                        <button onclick="showPanel(0, '#050e0e')">My Profile</button>
                        <button onclick="showPanel(1, '#050e0e')"> <i class="fa fa-edit"></i> Edit Profile</button>
                    </div>
                    <div class="tab-panel">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                <span class="agent-Status">
                                    {{$user->status}}  
                                </span>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                    Minima natus qui debitis autem corrupti hic quaerat dicta
                                    eum voluptate nulla, incidunt aspernatur iure. Nemo eum
                                    autem quaerat iure, odio sint repudiandae recusandae
                                    inventore asperiores culpa ipsam cumque. Ad ab dolorum quisquam,
                                    voluptas illum facere nostrum earum dolor voluptatum dignissimos
                                    iste maxime quaerat perspiciatis exercitationem dolore ea. 
                                    Ad ab dolorum quisquam,
                                    voluptas illum facere nostrum earum dolor voluptatum dignissimos
                                    iste maxime quaerat perspiciatis exercitationem dolore ea. 
                                    Ad ab dolorum quisquam,
                                    voluptas illum facere nostrum earum dolor voluptatum dignissimos
                                    iste maxime quaerat perspiciatis exercitationem dolore ea. 
                                </p>
                                <p>
            
                                    Illo, numquam delectus deserunt quas, sequi id iure laborum soluta n
                                    emo odio perspiciatis. Similique nesciunt eum asperiores
                                    natus sit illum consequuntur perspiciatis adipisci,
                                    incidunt ducimus odit recusandae corporis tempora
                                    id eligendi, et excepturi quod quo quia laudantium
                                    tempore, vitae maxime voluptatem voluptate. Nobis molestias
                                    temporibus labore asperiores pariatur atque earum id voluptates,
                                    commodi quos animi libero perferendis. Debitis voluptate amet
                                    nesciunt voluptatibus accusamus molestias ullam voluptatem. Ad ab dolorum quisquam,
                                    voluptas illum facere nostrum earum dolor voluptatum dignissimos
                                    iste maxime quaerat perspiciatis exercitationem dolore ea. 
                                    Ad ab dolorum quisquam,
                                    voluptas illum facere nostrum earum dolor voluptatum dignissimos
                                    iste maxime quaerat perspiciatis exercitationem dolore ea. 
                                </p>
                            </div>
                        </div>
                        <div class="property-details">
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker"></i><span>JHB, Gauteng</span>
                                </li>
                                <li>
                                    <i class="fa fa-briefcase"></i><span>BLM Real Estate Corp.</span>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i><span>(555) 366 - 00 - 00</span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i><span>{{$user->email}}  </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-panel">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action=" {{route('profile.edit')}} " method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-inputs">
                                                <input type="text" name="name" value=" {{ old('name',$user->name)}}" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-inputs">
                                                <input type="text" name="email"  value="{{old('email',$user->email)}} "  placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inputs">
                                        <label for="tags">Change Avatar</label><br>
                                        <input type="file" name="avatar" >
                                        <input type="hidden" name="image_name" value="{{Auth::user()->avatar}}">
                                    </div>
                                    <div class="form-inputs">
                                        <label for="tags">Status</label><br>
                                        <select name="status" id="">
                                            <option value="">Status</option>
                                            <option name="" value="Available">Available</option>
                                            <option name="" value="Busy">Busy</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-inputs">
                                        <input type="text" name="password" placeholder="Password">
                                        <span class="text-info">Leave blank to keep your password</span>
                                    </div>
                                    <div class="form-inputs">
                                        <button>Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---===== agents container====== ---->
<!---===== property List ====== ---->
<div class="property-container">
    <div class="container">
        <div class="row" id="property-header">
            <div class="col-lg-6 col-md-6">
                <h5>My Orders</h5>
            </div>
        </div>

        <div class="row">
            
        </div>
    </div>
</div>
<!---===== property List ====== ---->
<script>
    //get all buttons
    let tabButtons = document.querySelectorAll('.tabs button');
    let tabPanels = document.querySelectorAll('.agentDescription .tab-panel');

    //button onclick
    function  showPanel(panelIndex, colorCode){
        //looping through all buttons
        tabButtons.forEach(function(node){
            //setting color & background to null by default
            node.style.backgroundColor = "";
            node.style.color = "";

        });

        //setting background & color of the current button to 
        tabButtons[panelIndex].style.backgroundColor = colorCode;
        tabButtons[panelIndex].style.color = "#ffffff";

        //setting panel display to none by default
        tabPanels.forEach(function(node){
            node.style.display = "none";
            node.style.color = "";

        });
        //setting selected panel to flex by default
        tabPanels[panelIndex].style.display = "block";
    }
    //setting a default panel
    showPanel(0, '#050e0e');
</script>
@include('layouts.footer')