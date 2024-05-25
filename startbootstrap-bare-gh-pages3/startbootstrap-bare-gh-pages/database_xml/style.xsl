<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
        <head>
            <title>Users Database</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                table, th, td {
                    border: 1px solid black;
                }
                th, td {
                    padding: 10px;
                    text-align: left;
                }
            </style>
        </head>
        <body>
        <h2>Users Database</h2>
        <table>
            <tr>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <xsl:for-each select="users/user">
                <tr>
                    <td><xsl:value-of select="email"/></td>
                    <td><xsl:value-of select="password"/></td>
                </tr>
            </xsl:for-each>
        </table>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
