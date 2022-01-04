<!DOCTYPE html>
<html lang="en">
<head>
<title>PMT</title>
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
  background-color: #224BE4;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
  font-family: Times, "Times New Roman", serif;

}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 20%;
  height: auto;
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 80%;
  background-color: #f1f1f1;
  height: auto;
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
 padding: 25px;
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
          <h2>Project Management Tool</h2>
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
            @yield('article')
            </ul>
             <main> 
              @yield('content')
             </main>
          </article>
        </section>
        <br><br><br><br><br><br>
        <footer>
         
        </footer>
        
        </body>
</html>
