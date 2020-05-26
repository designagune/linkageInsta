# 📱Linkage Instagram API
![jquery](https://img.shields.io/badge/jQuery-v3.1.4-brightgreen) ![OAuth](https://img.shields.io/badge/OAuth-2.0-%23e13269)
<br /><br />
https://designagune.github.io/linkageInsta/
<br /><br />
## 📚목차
- 페이스북 앱 등록 및 인스타그램 테스터등록
- 임시토큰 발급
- Ajax로 호출, 장기토큰 발급
<br /><br /><br />

### API 사용 전 필요사항
- 페이스북 계정
- 인스타그램 계정
- 연동 할 페이지 -> SSL(HTTPS)적용 필수

<br /><br />
## 페이스북 앱 등록 및 인스타그램 테스터등록
https://developers.facebook.com/
<br /><br />
![image](https://user-images.githubusercontent.com/49800442/82858451-e404b280-9f4e-11ea-93d9-f31bfc5b98a2.png)
<br /><br />
앱 만들기 버튼 클릭 후 새 앱 ID만들기라는 모달창이 뜨게되는데 표시이름에 앱 이름을 적어주고 연락처 이메일에 본인 메일을 기재
<br /><br />
![image](https://user-images.githubusercontent.com/49800442/82858700-99d00100-9f4f-11ea-971a-3952e2faf9b5.png)
<br /><br />
앱 생성 후 설정 -> 기본설정에 접속. 맨 하단 플랫폼 추가를 클릭 후 웹사이트를 선택한다음 URL을 입력후 변경 내용 저장 클릭.
<br /><br />
![image](https://user-images.githubusercontent.com/49800442/82858890-1f53b100-9f50-11ea-9b2d-6e275cea61a6.png)
<br /><br />
이미지에서는 미리 인스타그램을 등록했지만 보이는 부분처럼 제품 클릭 후 상단 제품들중 인스타그램을 고르고 설정 클릭.
<br /><br />
![image](https://user-images.githubusercontent.com/49800442/82859025-84a7a200-9f50-11ea-8abe-5f0300fe225d.png)
<br /><br />
인스타그램 제품선택 후 기본표시에 접속. 표시이름, OAuth설정 순으로 이미지와 같은 양식으로 기재.<br />
(단, SSL 설정이 되어있지 않은경우 입력되지않음)
<br /><br />
![image](https://user-images.githubusercontent.com/49800442/82859148-ebc55680-9f50-11ea-985e-f95e1e28f4cf.png)
<br /><br />
역할 부분에 들어가서 Instagram 테스터 추가 버튼을 클릭하여 가져올 계정을 추가
<br /><br />
![image](https://user-images.githubusercontent.com/49800442/82859375-7f972280-9f51-11ea-921b-558ac0c6d625.png)
<br /><br />
https://www.instagram.com/ 인스타그램 페이지로 이동 하여 프로필페이지로 이동 후 편집옆 톱니바퀴모양 클릭 <br />
앱 및 웹사이트 클릭 후 테스터 초대 서브메뉴에서 승인
<br /><br /><br />
## 임시토큰 발급
<br /><br />
![image](https://user-images.githubusercontent.com/49800442/82859622-37c4cb00-9f52-11ea-8af5-f731aea117d5.png)
<br /><br />
Generate Token 클릭 후 인스타계정으로 로그인. 승인을 하고 모달창에서 I Understand를 클릭하게되면 임시토큰이 발급
<br />
( 🔑 발급 받은 임시토큰의 유효기간은 1시간 입니다. 유효기간 이후에는 expire되어 사용할 수 없으니 참고하세요. <br />
장기적인 토큰 (Long-Lived Access Token) 발급 부분은 다음 문단에서 언급하겠습니다 )
<br /><br />
- 이 방법 외에 쿼리문을 날려서 Access Token을 받는 방법도 있으나 설명하지 않겠습니다. ( 하단에 참고페이지를 링크 걸겠습니다 )
<br /><br /><br />
## Ajax로 호출, 장기토큰 발급
<br /><br />
Ajax로 호출부분은 Index.html head부분 script 코드를 참고<br />
이전 문단에서 발급받은 토큰을 변수 var token에 넣고 ajax로 url 호출을 진행 <br />
데이터를 성공적으로 받아와 done일경우 매개변수 data에 받은 데이터를 넣고 each문을 돌려 data object의 갯수만큼 반복<br />
반복된 데이터를 변수(타입 string) list에 넣고 append 시킴<br />
<br /><br />
### 장기토큰 발급
<br /><br />
https://developers.facebook.com/docs/instagram-basic-display-api/guides/long-lived-access-tokens
<br /><br />
```https://graph.instagram.com/access_token?grant_type=ig_exchange_token&client_secret={instagram-app-secret}&access_token={short-lived-access-token}```
<br /><br />
공식 문서를 바탕으로 {instagram-app-secret} 부분에 Instagram 앱 시크릿 코드를 넣고<br />
{short-lived-access-token}부분에 현재 사용하고있는 임시토큰을 삽입하여 GET방식으로 보냄
<br /><br />
응답 받은 json의 결과가 정상적이라면 access_token key의 value값이 장기토큰 값이고 expire_in key의 value값은 토큰의 남은 기간(초 단위) 으로 결과가 출력
<br />
refresh방법은 공식문서에 적혀있고 비슷한 방식이므로 생략
<br /><br />
### 참조한 포스트목록
- https://playon.tistory.com/
- https://m.blog.naver.com/uok02018496/221796292156
