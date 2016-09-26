<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
  <body>
  <h2>Προγραμμα</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th></th>
      <th>Δευτέρα</th>
	  <th>Τρίτη</th>
	  <th>Τετάρτη</th>
	  <th>Πέμπτη</th>
	  <th>Παρασκευή</th>
    </tr>
    <xsl:for-each select="timeframes/timeframe[@id='101']/courses/course">
    <tr>
		<td width="20"></td>
		<td style="text-align: center; "><xsl:value-of select="name"/><br />
		<xsl:value-of select="professor"/><br />
		<xsl:value-of select="classroom"/><br />
		<xsl:value-of select="official_course_id"/><br />
		</td>
		
    </tr>
    </xsl:for-each>
  </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>