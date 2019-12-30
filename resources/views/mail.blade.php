
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head></head>
    <body>
Bonjour {{ $data["name"] }},
<p>Vous pouvez à présent vous connecter au dashboard superworks via l'URL suivante : http://dashboard.superworks.fr/</p>
<p>Afin de vous connecter vous pouvez utiliser les accès suivants :</p>
<p> <strong>login :</strong> {{ $data["name"] }}</p>
<p> <strong> password :</strong>{{ $data["password"] }}</p>
<p>N'hésitez pas à nous contacter si vous n'arrivez pas à vous connecter à l'email suivant : support@superworks.fr</p>
<p><strong>Cordialement,</strong></p>
<p><strong>L'équipe Superworks</strong></p>
    </body>
</html>
