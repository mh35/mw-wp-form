<?php
class MW_WP_Form_Validation_Rule_Alpha_Test extends WP_UnitTestCase {

	/**
	 * @var MW_WP_Form_Validation_Rule_Alpha
	 */
	protected $Rule;
	
	/**
	 * setUp
	 */
	public function setUp() {
		parent::setUp();
		$form_key   = MWF_Config::NAME . '-1';
		$this->Data = MW_WP_Form_Data::getInstance( $form_key );
		$this->Rule = new MW_WP_Form_Validation_Rule_Alpha();
		$this->Rule->set_Data( $this->Data );
	}

	/**
	 * @backupStaticAttributes enabled
	 */
	public function test_空文字列ならnull() {
		$this->Data->set( 'text', '' );
		$this->assertNull( $this->Rule->rule( 'text' ) );
	}

	/**
	 * @backupStaticAttributes enabled
	 */
	public function test_アルファベットのみならnull() {
		$this->Data->set( 'text', 'abc' );
		$this->assertNull( $this->Rule->rule( 'text' ) );
	}

	/**
	 * @backupStaticAttributes enabled
	 */
	public function test_アルファベット以外が含まれていたらnotnull() {
		$this->Data->set( 'text', 'abc123' );
		$this->assertNotNull( $this->Rule->rule( 'text' ) );
	}
}
