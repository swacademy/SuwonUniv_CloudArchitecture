# 윈도우10에서 SSH 접속 시 pem 파일 권한변경

EC2 인스턴스를 SSH로 접속하고 싶을 때는, pem 파일을 활용해야 한다.
그런데 보안특성 상 AWS 홈페이지에서 다운받은 pem 파일을 그대로 사용하면 permission 에러가 난다.
파일 자체에 권한이 너무 많이 부여돼서 위험하니, 권한을 제한하라는 경고 문구가 나온다.

아래 문구처럼 나온다...

<pre id="code_1624886063200" class="shell" data-ke-language="shell" data-ke-type="codeblock"><code>@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@         WARNING: UNPROTECTED PRIVATE KEY FILE!          @
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
Permissions 0644 for 'amazonec2.pem' are too open.
It is recommended that your private key files are NOT accessible by others.
This private key will be ignored.
bad permissions: ignore key: amazonec2.pem
Permission denied (publickey).</code></pre>

그래서 이 파일의 접근권한을 변경해줘야 한다.
리눅스 운영체제의 경우 sudo chmod 400 [파일명]으로 간단하게  파일 권한을 바꿀 수 있다.
그런데 윈도우에서는 chmod 400이라는 명령어가 안되니 다른 방법으로 권한을 바꿔주야 한다.

구글링해보면 속성 → 보안텝으로 들어가서 권한을 변경해주는 방법들이 있지만 그 방법대로는 제대로 권한이 변경되지 않았고, 결국 아래와 같은 코드를 cmd (Power shell 아님, power shell과 cmd는 문법이 조금 다름) 에서 순차적으로 실행하니 됐다.

<pre id="code_1624886587065" class="shell" data-ke-language="shell" data-ke-type="codeblock"><code># cmd에서만 되고 powershell에서는 안됨
# myec2.pem 자리에 본인의 pem 파일 명을 대입하면 됨
# cmd는 pem 파일이 있는 폴더에서 실행해야 함

icacls.exe myec2.pem /reset
icacls.exe myec2.pem /grant:r %username%:(R)
icacls.exe myec2.pem /inheritance:r</code></pre>


[출처] https://dabid.tistory.com/11
