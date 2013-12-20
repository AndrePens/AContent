<!-- Matching question -->
<question type="matching">
    <name>
      <text>Matching question</text>
    </name>
    <questiontext format="html">
      <text><?php echo $this->row['question']; ?></text>
    </questiontext>
    <generalfeedback format="html">
      <text> </text>
    </generalfeedback>
    <defaultgrade>1.0000000</defaultgrade>
    <penalty>0.3333333</penalty>
    <hidden>0</hidden>
    <shuffleanswers>true</shuffleanswers>
    <correctfeedback format="html">
      <text><![CDATA[<p>Risposta corretta.</p>]]></text>
    </correctfeedback>
    <partiallycorrectfeedback format="html">
      <text><![CDATA[<p>Risposta parzialmente corretta.</p>]]></text>
    </partiallycorrectfeedback>
    <incorrectfeedback format="html">
      <text><![CDATA[<p>Risposta errata.</p>]]></text>
    </incorrectfeedback>
	
	
    <shownumcorrect/>
	
	
    <subquestion format="html">
      <text><![CDATA[<p>First question</p>]]></text>
      <answer>
        <text>First answer</text>
      </answer>
    </subquestion>
    <subquestion format="html">
      <text><![CDATA[<p>Second question</p>]]></text>
      <answer>
        <text>Second answer</text>
      </answer>
    </subquestion>
    <subquestion format="html">
      <text><![CDATA[<p>Third question</p>]]></text>
      <answer>
        <text>Third answer</text>
      </answer>
    </subquestion>
  </question>
