<?php
namespace NicokaraDotNet;

use PHPUnit\Framework\TestCase;

class ApiClientTest extends TestCase
{
    /**
     * @deprecated
     * このテストは、近いうちに削除されます。
     * 最初期にユニットテストの設定がちゃんとできているかを確認するためだけに実装されたテストケースです。
     */
    public function testTest() {
        $this->assertTrue(true);
    }

    /**
     * @deprecated
     * このテストは、近いうちに削除されます。
     * 最初期にユニットテストの設定がちゃんとできているかを確認するためだけに実装されたテストケースです。
     */
    public function testAutoLoad() {
        $this->assertSame('NicokaraDotNet\\ApiClient', ApiClient::class);
    }
}
