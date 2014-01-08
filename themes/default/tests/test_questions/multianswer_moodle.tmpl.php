<question type="multichoice">
    <name>
      <text>Risposta multipla</text>
    </name>
    <questiontext format="html">
      <text><</text>
    </questiontext>
    <generalfeedback format="html">
      <text></text>
    </generalfeedback>
    <defaultgrade>1.0000000</defaultgrade>
    <penalty>0.3333333</penalty>
    <hidden>0</hidden>
    <single>true</single>
    <shuffleanswers>true</shuffleanswers>
    <answernumbering>abc</answernumbering>
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
    <?php for ($i=0; $i < $this->num_choices; $i++): ?>
        <?php if ($this->row['answer_'.$i]): ?>
            <answer fraction="100" format="html">
              <text></text>
              <feedback format="html">
                <text><?php echo $this->row['choice_'.$i]; ?></text>
              </feedback>
            </answer>
        <?php endif; ?>
    <?php endfor; ?>
  </question>