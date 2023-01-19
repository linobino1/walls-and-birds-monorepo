<html>
<body>
<h1>Neues Walls & Birds Konzert ankuendigen:</h1>
<form action="insertnewshow.php" method="post" accept-charset="character_set">
day: <input type="text" name="day" /> YYYY-MM-DD<br><br>
city: <input type="text" name="city" /><br><br>
location: <input type="text" name="location" /><br><br>
name of the event(opt): <input type="text" name="eventname" /><br><br>
link: <input type="text" name="link" /><br><br>
<input type="submit" />
<h1>Alle Konzerte am Datum X loeschen:</h1>
</form>
<form action="deleteshow.php" method="post" accept-charset="character_set">
day: <input type="text" name="day" /> YYYY-MM-DD<br><br>
<input type="submit" />
</form>
</body>
</html>