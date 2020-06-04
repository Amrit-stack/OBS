<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="center">
        <p id="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate incidunt praesentium, rerum voluptatem in reiciendis officia harum repudiandae tempore suscipit ex ea, adipisci ab porro.</p>
    </div>

  <div class="mylink">
    <a target="_blank" href="http://kenyzachelin.fr">Coded by Keny Zachelin</a>  
  </div>
  <script type="text/javascript">
  	 var text = document.getElementById('text');
        var newDom = '';
        var animationDelay = 6;

        for(let i = 0; i < text.innerText.length; i++)
        {
            newDom += '<span class="char">' + (text.innerText[i] == ' ' ? '&nbsp;' : text.innerText[i])+ '</span>';
        }

        text.innerHTML = newDom;
        var length = text.children.length;

        for(let i = 0; i < length; i++)
        {
            text.children[i].style['animation-delay'] = animationDelay * i + 'ms';
        }
    
  </script>
</body>
</html>
<style>
 *{
            box-sizing: border-box;
        }

        body{
            margin: 0;
            background-color: #232323;
            color: #fff;
            font-family: Calibri, sans-serif;
        }

        .center{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        p{
            width: 70%;
            font-size: 30px;
            display: block;
            text-align: center;
        }

        .char{
            font-size: 40px;
            height: 40px;
            animation: an 1s ease-out 1 both;
            display: inline-block;
        }

        @keyframes an{
            from{
                opacity: 0;
                transform: perspective(500px) translate3d(-35px, -40px, -150px) rotate3d(1, -1, 0, 35deg);
            }
            to{
                opacity: 1;
                transform: perspective(500px) translate3d(0, 0, 0);
            }
        }
.mylink{
  position: absolute;
  z-index: 150;
  bottom: 0;
  right: 0;
  width: 100%;
  text-align: right;
  padding: .6rem;
}

.mylink a{
  font-family: Calibri;
  color: #fff;
  border-bottom: 1px solid #fff;
  opacity: .5;
  transition: opacity .3s;
  text-decoration: none
}
.mylink a:hover{
  opacity: 1
}
</style>