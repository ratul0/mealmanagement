<div class="navbar navbar-default">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        {{ link_to('home','Meal Management',$attributes=['class'=>'navbar-brand']) }}
       </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
          

                @if(Auth::check())

                   

                    
                    @endif
                    
                    
          
        </ul>
          <ul class="nav navbar-nav navbar-right">
            
             @if(!Auth::check())
                    
                    
                    <li>{{ HTML::linkRoute('login','Login') }}</li>
                    @else

                      @if(Session::get('role') == 1)
                        <li><a href="#">Admin</a></li>
                        
                      @endif
                      @if(Session::get('role') == 2)
                        <li><a href="#">Manager</a></li>
                        
                      @endif
                      @if(Session::get('role') == 3)
                        <li><a href="#">User</a></li>
                        
                      @endif
                        <li>{{ HTML::linkRoute('user.update','Change Cridentials') }}</li> 
                        <li>{{ HTML::linkRoute('logout','Logout ('.Auth::user()->username.')') }}</li> 
                    @endif
        </ul>
      </div>
    </div>