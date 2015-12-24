<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <office:document-content xmlns:office="urn:oasis:names:tc:opendocument:xmlns:office:1.0"
                             xmlns:style="urn:oasis:names:tc:opendocument:xmlns:style:1.0"
                             xmlns:text="urn:oasis:names:tc:opendocument:xmlns:text:1.0"
                             xmlns:table="urn:oasis:names:tc:opendocument:xmlns:table:1.0"
                             xmlns:draw="urn:oasis:names:tc:opendocument:xmlns:drawing:1.0"
                             xmlns:fo="urn:oasis:names:tc:opendocument:xmlns:xsl-fo-compatible:1.0"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:dc="http://purl.org/dc/elements/1.1/"
                             xmlns:meta="urn:oasis:names:tc:opendocument:xmlns:meta:1.0"
                             xmlns:number="urn:oasis:names:tc:opendocument:xmlns:datastyle:1.0"
                             xmlns:svg="urn:oasis:names:tc:opendocument:xmlns:svg-compatible:1.0"
                             xmlns:chart="urn:oasis:names:tc:opendocument:xmlns:chart:1.0"
                             xmlns:dr3d="urn:oasis:names:tc:opendocument:xmlns:dr3d:1.0"
                             xmlns:math="http://www.w3.org/1998/Math/MathML"
                             xmlns:form="urn:oasis:names:tc:opendocument:xmlns:form:1.0"
                             xmlns:script="urn:oasis:names:tc:opendocument:xmlns:script:1.0"
                             xmlns:ooo="http://openoffice.org/2004/office"
                             xmlns:ooow="http://openoffice.org/2004/writer"
                             xmlns:oooc="http://openoffice.org/2004/calc"
                             xmlns:dom="http://www.w3.org/2001/xml-events"
                             xmlns:xforms="http://www.w3.org/2002/xforms"
                             xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                             xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                             xmlns:rpt="http://openoffice.org/2005/report"
                             xmlns:of="urn:oasis:names:tc:opendocument:xmlns:of:1.2"
                             xmlns:xhtml="http://www.w3.org/1999/xhtml"
                             xmlns:grddl="http://www.w3.org/2003/g/data-view#"
                             xmlns:tableooo="http://openoffice.org/2009/table"
                             xmlns:field="urn:openoffice:names:experimental:ooo-ms-interop:xmlns:field:1.0"
                             office:version="1.2">
      <office:scripts/>
      <office:font-face-decls>
        <style:font-face style:name="Mangal1" svg:font-family="Mangal"/>
        <style:font-face style:name="Times New Roman" svg:font-family="&apos;Times New Roman&apos;"
                         style:font-family-generic="roman" style:font-pitch="variable"/>
        <style:font-face style:name="Arial" svg:font-family="Arial" style:font-family-generic="swiss"
                         style:font-pitch="variable"/>
        <style:font-face style:name="Mangal" svg:font-family="Mangal" style:font-family-generic="system"
                         style:font-pitch="variable"/>
        <style:font-face style:name="Microsoft YaHei" svg:font-family="&apos;Microsoft YaHei&apos;"
                         style:font-family-generic="system" style:font-pitch="variable"/>
        <style:font-face style:name="SimSun" svg:font-family="SimSun" style:font-family-generic="system"
                         style:font-pitch="variable"/>
      </office:font-face-decls>
      <office:automatic-styles>
        <style:style style:name="P1" style:family="paragraph" style:parent-style-name="Header">
          <style:paragraph-properties fo:text-align="center" style:justify-single-word="false"/>
        </style:style>
        <style:style style:name="P2" style:family="paragraph" style:parent-style-name="Footer">
          <style:paragraph-properties fo:text-align="end" style:justify-single-word="false"/>
        </style:style>
        <style:style style:name="P3" style:family="paragraph" style:parent-style-name="Text_20_body">
          <style:text-properties fo:font-size="14pt" fo:font-weight="bold" style:font-size-asian="14pt"
                                 style:font-weight-asian="bold" style:font-size-complex="14pt"
                                 style:font-weight-complex="bold"/>
        </style:style>
        <style:style style:name="P4" style:family="paragraph" style:parent-style-name="Text_20_body">
          <style:text-properties fo:font-size="12pt" fo:font-weight="normal" style:font-size-asian="12pt"
                                 style:font-weight-asian="normal" style:font-size-complex="12pt"
                                 style:font-weight-complex="normal"/>
        </style:style>
        <style:style style:name="P5" style:family="paragraph" style:parent-style-name="Heading_20_1">
          <style:text-properties fo:color="#006600"/>
        </style:style>
        <style:style style:name="P6" style:family="paragraph" style:parent-style-name="Horizontal_20_Line">
          <style:text-properties fo:font-size="12pt" fo:font-weight="normal" style:font-size-asian="12pt"
                                 style:font-weight-asian="normal" style:font-size-complex="12pt"
                                 style:font-weight-complex="normal"/>
        </style:style>
        <style:style style:name="fr1" style:family="graphic" style:parent-style-name="Graphics">
          <style:graphic-properties fo:margin-left="0cm" fo:margin-right="0.3cm" style:run-through="foreground"
                                    style:wrap="right" style:number-wrapped-paragraphs="no-limit"
                                    style:wrap-contour="false" style:vertical-pos="from-top"
                                    style:vertical-rel="paragraph" style:horizontal-pos="from-left"
                                    style:horizontal-rel="paragraph" style:mirror="none"
                                    fo:clip="rect(0cm, 0cm, 0cm, 0cm)" draw:luminance="0%" draw:contrast="0%"
                                    draw:red="0%" draw:green="0%" draw:blue="0%" draw:gamma="100%"
                                    draw:color-inversion="false" draw:image-opacity="100%"
                                    draw:color-mode="standard"/>
        </style:style>
      </office:automatic-styles>
      <office:body>
        <office:text>
          <text:sequence-decls>
            <text:sequence-decl text:display-outline-level="0" text:name="Illustration"/>
            <text:sequence-decl text:display-outline-level="0" text:name="Table"/>
            <text:sequence-decl text:display-outline-level="0" text:name="Text"/>
            <text:sequence-decl text:display-outline-level="0" text:name="Drawing"/>
          </text:sequence-decls>
          <text:h text:style-name="P5" text:outline-level="1">Flower Arrangements</text:h>
          <xsl:for-each select="root/row">
            <text:h text:style-name="Heading_20_2" text:outline-level="2"><xsl:value-of select="title"/></text:h>
            <text:p text:style-name="P3">
              <draw:frame draw:style-name="fr1" draw:name="graphics1" text:anchor-type="paragraph" svg:x="0.06cm"
                          svg:y="0cm" svg:width="3.611cm" svg:height="3.611cm" draw:z-index="0">
                <draw:image xlink:href="Pictures/10000000000000C8000000C8C6E17DCD.jpg" xlink:type="simple"
                            xlink:show="embed" xlink:actuate="onLoad"/>
              </draw:frame>
              $<xsl:value-of select="price"/>
            </text:p>
            <xsl:for-each select="description/p">
              <text:p text:style-name="P4"><xsl:value-of select="."/></text:p>
            </xsl:for-each>
            <text:p text:style-name="P6"/>
          </xsl:for-each>
        </office:text>
      </office:body>
    </office:document-content>
  </xsl:template>
</xsl:stylesheet>