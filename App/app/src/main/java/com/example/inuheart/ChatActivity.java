package com.example.inuheart;

import android.app.Activity;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.List;

import dataBaseService.DbAccessManger;

/**
 * Created by Reborn on 2017/7/28.
 */

public class ChatActivity extends Activity{

    private Bundle b;
    private WebView browser;
    private TextView toolbar_title;
    private Toolbar boolBar;
    private ImageButton back;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        b = getIntent().getExtras();
        String judge = b.getString("judge");
        switch (judge){
            case "多人匿名聊天室":
                setContentView(R.layout.chat_consult);

                boolBar = (Toolbar)findViewById(R.id.toolbar);
                toolbar_title = (TextView) boolBar.findViewById(R.id.toolbar_title);
                back = (ImageButton) findViewById(R.id.back);
                browser=(WebView)findViewById(R.id.Toweb);

                browser.loadUrl("http://192.168.1.105:8081/?rank=user");
                toolbar_title.setText(judge);
                //设置可自由缩放网页
                browser.getSettings().setSupportZoom(true);
                browser.getSettings().setBuiltInZoomControls(true);

                // 如果页面中链接，如果希望点击链接继续在当前browser中响应，
                // 而不是新开Android的系统browser中响应该链接，必须覆盖webview的WebViewClient对象
                browser.setWebViewClient(new WebViewClient() {
                    public boolean shouldOverrideUrlLoading(WebView view, String url)
                    {
                        //  重写此方法表明点击网页里面的链接还是在当前的webview里跳转，不跳到浏览器那边
                        view.loadUrl(url);
                        return true;
                    }
                });

                back.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        finish();
                    }
                });
                break;
            case "在线咨询室":
                setContentView(R.layout.chat_consult);

                boolBar = (Toolbar)findViewById(R.id.toolbar);
                toolbar_title = (TextView) boolBar.findViewById(R.id.toolbar_title);
                back = (ImageButton) findViewById(R.id.back);
                browser=(WebView)findViewById(R.id.Toweb);

                browser.loadUrl("http://192.168.1.105:8080/InUheart1/chat.html#");
                toolbar_title.setText(judge);
                //设置可自由缩放网页
                browser.getSettings().setSupportZoom(true);
                browser.getSettings().setBuiltInZoomControls(true);

                // 如果页面中链接，如果希望点击链接继续在当前browser中响应，
                // 而不是新开Android的系统browser中响应该链接，必须覆盖webview的WebViewClient对象
                browser.setWebViewClient(new WebViewClient() {
                    public boolean shouldOverrideUrlLoading(WebView view, String url)
                    {
                        //  重写此方法表明点击网页里面的链接还是在当前的webview里跳转，不跳到浏览器那边
                        view.loadUrl(url);
                        return true;
                    }
                });

                back.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        finish();
                    }
                });
                break;
        }

    }

    //go back
    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
        WebView browser=(WebView)findViewById(R.id.Toweb);
        // Check if the key event was the Back button and if there's history
        if ((keyCode == KeyEvent.KEYCODE_BACK) && browser.canGoBack()) {
            browser.goBack();
            return true;
        }
        //  return true;
        // If it wasn't the Back key or there's no web page history, bubble up to the default
        // system behavior (probably exit the activity)
        return super.onKeyDown(keyCode, event);
    }
}
