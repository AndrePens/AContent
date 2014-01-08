<question type="truefalse">
    <name>
      <text>True or False</text>
    </name>
    <questiontext format="html">
      <text><?php echo $this->row['question']; ?></text>
    </questiontext>
    <generalfeedback format="html">
      <text></text>
    </generalfeedback>
    <defaultgrade>1.0000000</defaultgrade>
    <penalty>1.0000000</penalty>
    <hidden>0</hidden>
    <answer fraction="0" format="moodle_auto_format">
      <text>true</text>
      <feedback format="html">
        <text><?php echo _AT('true'); ?></text>
      </feedback>
    </answer>
    <answer fraction="100" format="moodle_auto_format">
      <text>false</text>
      <feedback format="html">
        <text><?php echo _AT('false'); ?></text>
      </feedback>
    </answer>
  </question>