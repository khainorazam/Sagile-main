<!DOCTYPE html>
<html lang="en">
<head>
<title>Project Management Tool</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #224BE4 ;
  padding: 15px;
  text-align: center;
  font-size: 35px;
  color: white;
  font-family: Times, "Times New Roman", serif;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 15%;
   /* only for demonstration, should be removed */
  background: #ccc;
  padding: 15px;

}

/* Style the list inside the menu */
nav ul {
  list-style-type: disc;
  list-style-position: inside;
  padding: 20px;
  }

article {
  float: left;
  padding-top: 5px;
  padding-left: 5px;
  width: 85%;
  background-color: #f1f1f1;
  
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

/* Style for upper button*/
.flex-center {
  align-items: center;
  display: flex;
  justify-content: center;
}

.position-ref {
  position: relative;
}

.full-height {
 height: 100vh;
}

.top-right {
 position: absolute;
 right: 10px;
 top: 18px;
}

.links > a {
 color: #9dcdf5;
 padding: 30px;
 font-size: 13px;
 font-weight: 600;
 letter-spacing: .1rem;
 text-decoration: none;
 text-transform: uppercase;
}

/* Style the footer */
/* footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
} */

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #4a82b0;
}

.aside {
  float: left;
}

.aside a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

.aside a:hover {
  background-color: #111111;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
  
}
</style>
</head>
<body>

        <header>
          <h3>Project Management Tool</h3>
        </header>
        
        <section>
          <nav>
            <ul>
                <p>Project</p>
                @yield('dashboard')
                    
            </ul>
          </nav>
          
          <article>
              
            <ul>
                    <li class="aside a"><a href="{{route('profeature.index')}}">Project List</a></li>
                    <li class="aside a"><a href="{{route('team.index')}}">Team</a></li>
                    <li class="aside a"><a href="{{route('status.index')}}">Status</a></li>
                    <li class="aside a"><a href="{{route('tasks.index')}}">Kanban Board</a><li>
                    {{-- <li class="aside a"><a href="{{route('chart.index')}}">Burn Down Chart</a><li> --}}
                    <li class="aside a"><a href="{{route('perfeature.index')}}">Performance Feature</a></li>
                    <li class="aside a"><a href="{{route('secfeature.index')}}">Security Feature</a></li>
                    {{--  <li class="aside a"><a href="{{route('deffeature.index')}}">Defect Feature</a></li> --}}
                    <li class="aside a"><a href="{{route('codestand.index')}}">Coding Standard</a></li>
                    <li class="aside a"><a href="{{route('role.index')}}">Role</a></li>
                    {{-- <li class="aside a"><a href="{{route('attachment.index')}}">File</a></li> --}}
                    <li class="aside a"><a href="{{url('/logout')}}">Logout</a></li>
            
            </ul>
             <main> 
              @yield('content')
             </main>
          </article>
        </section>
        <br><br><br><br><br><br>
        <footer>
          <p></p>
        </footer>
        
        </body>
</html>
