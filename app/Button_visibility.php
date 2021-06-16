<div id="logon" style="display: none;">
                <form name="login" method="post">
                    Username:<input name="username" type="text" size="14"/><br>
                    Password:<input name="password" type="password" size="14"/><br>
                    <input type="submit" value="Login"/>
                </form>
            </div>
            <div id="button"><button onClick="show()">Show Screen</button></div>
            <script>
            function show() {
                document.getElementById('logon').style.display = 'block'; // Show the #logon div
                document.getElementById('button').innerHTML = '<button onClick="hide()">Hide Screen</button>';
            }

            function hide() {
                document.getElementById('logon').style.display = 'none'; // Hide the #logon div
                document.getElementById('button').innerHTML = '<button onClick="show()">Show Screen</button>';
            }
            </script>