<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>accordion demo</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
</head>
<body>

<table class="research">
                <tbody>
                    <tr class="accordion">
                        <td colspan="3">This is the header</td>
                    </tr>
                    <tr>
                        <td>Research</td>
                        <td>Description</td>
                        <td>Partner</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
                    </tr>
                </tbody>
            </table>

            <table class="research">
                <tbody>
                    <tr class="accordion">
                        <td colspan="3">This is the header</td>
                    </tr>
                    <tr>
                        <td>Research</td>
                        <td>Description</td>
                        <td>Partner</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
                    </tr>
                </tbody>
            </table>

            <table class="research">
                <tbody>
                    <tr class="accordion">
                        <td colspan="3">This is the header</td>
                    </tr>
                    <tr>
                        <td>Research</td>
                        <td>Description</td>
                        <td>Partner</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
                        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</td>
                    </tr>
                </tbody>
            </table>
<script>
$(function() {
  $(".research tr:not(.accordion)").hide();
  $(".research tr:first-child").show();
  $(".research tr.accordion").click(function(){
  $(this).nextAll("tr").toggle();
    });
  });
</script>
</body>
</html>

