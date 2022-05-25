<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto" method="GET" action="/cari">
      @csrf 
      <div class="col-auto">
          <select onchange="yesnoCheck(this);" class="form-control form-select"  type="seacrh">
            <option value="kota">Kota</option>
            <option value="tanggal">Tanggal</option>
            <option value="jam">Jam</option>
            <option value="suhu">Suhu</option>
          </select>

      </div>
       <div class="col">
           <div class="form-group">
               <input name="kota" id="ifkota" class="form-control" placeholder="cari kota" type="search" aria-label="search">
               <button class="btn" id="ifkotaBtn" class="btn-outline-succes my-2 my-sm 0" type="submit"><i class="fas fa-search"></i></button>
           </div>
           <div class="form-group">
            <input name="jam" id="ifjam" style="display: none" class="form-control" placeholder="cari jam" type="search" aria-label="search">
            <button class="btn" id="ifjamBtn" style="display: none" class="btn-outline-succes my-2 my-sm 0" type="submit"><i class="fas fa-search"></i></button>
        </div>
        <div class="form-group">
            <input name="tanggal" id="iftgl" style="display: none" class="form-control" placeholder="cari tanggal" type="search" aria-label="search">
            <button class="btn" id="iftanggalBtn"style="display: none" class="btn-outline-succes my-2 my-sm 0" type="submit"><i class="fas fa-search"></i></button>
        </div>
        <div class="form-group">
            <input name="suhu" id="ifsuhu" style="display: none" class="form-control" placeholder="cari suhu" type="search" aria-label="search">
            <button class="btn" id="ifsuhuBtn" style="display: none" class="btn-outline-succes my-2 my-sm 0" type="submit"><i class="fas fa-search"></i></button>
        </div>

       </div>
    </form>
    <ul class="navbar-nav navbar-right">


        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-2.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">
                    @if (!@empty(auth()->user()->name))
                        {{auth()->user()->name}}
            
                            
                        @else
                            {{"Anonymous"}}
                        @endif
                    
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-divider"></div>

                <a href="/logout" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
        document.getElementById('formlogout').submit()">

                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="formlogout" action="/logout" method="post">@csrf</form>
            </div>
        </li>
    </ul>
</nav>


<script>
    function yesnoCheck(that){
        if(that.value == "tanggal"){
            document.getElementById("iftgl").style.display ="block";
            document.getElementById("iftanggalBtn").style.display ="block";

            document.getElementById("ifkota").style.display ="none";
            document.getElementById("ifkotaBtn").style.display ="none";

            document.getElementById("ifsuhu").style.display ="none";
            document.getElementById("ifsuhuBtn").style.display ="none";

            document.getElementById("ifjam").style.display ="none";
            document.getElementById("ifjamBtn").style.display ="none";
            
        }else if(that.value == "jam"){
            document.getElementById("iftgl").style.display ="none";
            document.getElementById("iftanggalBtn").style.display ="none";

            document.getElementById("ifkota").style.display ="none";
            document.getElementById("ifkotaBtn").style.display ="none";

            document.getElementById("ifsuhu").style.display ="none";
            document.getElementById("ifsuhuBtn").style.display ="none";

            document.getElementById("ifjam").style.display ="block";
            document.getElementById("ifjamBtn").style.display ="block";
            
        }
        else if(that.value == "suhu"){
            document.getElementById("iftgl").style.display ="none";
            document.getElementById("iftanggalBtn").style.display ="none";

            document.getElementById("ifkota").style.display ="none";
            document.getElementById("ifkotaBtn").style.display ="none";

            document.getElementById("ifsuhu").style.display ="block";
            document.getElementById("ifsuhuBtn").style.display ="block";

            document.getElementById("ifjam").style.display ="none";
            document.getElementById("ifjamBtn").style.display ="none";
            
        }else{
            document.getElementById("iftgl").style.display ="none";
            document.getElementById("iftanggalBtn").style.display ="none";

            document.getElementById("ifkota").style.display ="block";
            document.getElementById("ifkotaBtn").style.display ="block";

            document.getElementById("ifsuhu").style.display ="none";
            document.getElementById("ifsuhuBtn").style.display ="none";

            document.getElementById("ifjam").style.display ="none";
            document.getElementById("ifjamBtn").style.display ="none";
            
        }
    }
</script>