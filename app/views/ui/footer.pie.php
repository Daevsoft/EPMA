            </div>
        </div>
    </div>
_(( js_source('bootstrap.min') ))
_(( js_source('bootstrap-select.min') ))
<script>
function times(){
    var now = new Date();
    var minute = now.getMinutes();
    var hour = now.getHours();
    minute = minute < 10 ? '0'+minute : minute;
    hour = hour < 10 ? '0'+hour : hour;
    $('#time').text(hour + ':' + minute);
}
setInterval(times, 1000);
</script>
</body>
</html>