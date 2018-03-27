package com.example.inuheart;
import dataBaseService.DbAccessManger;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Looper;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.Struct;
import java.util.List;

/**
 * Created by 建超 on 2017/2/22.
 */
public class LoginActivity extends Activity {

    private ImageButton back;
    private Button login;
    private EditText name,pwd;
    private ProgressDialog pDialog;
    SharedPreferences mySharedPreferences;
    SharedPreferences.Editor editor;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        back = (ImageButton) findViewById(R.id.back);
        login = (Button) findViewById(R.id.login);
        name = (EditText) findViewById(R.id.name);
        pwd = (EditText) findViewById(R.id.password);

        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(name.getText().toString().equals("")||pwd.getText().toString().equals("")) {
                    Toast.makeText(LoginActivity.this, "请输入用户名或密码", Toast.LENGTH_SHORT).show();
                }
                else {
                    pDialog = new ProgressDialog(LoginActivity.this);
                    pDialog.setMessage("登录中……");
                    pDialog.setIndeterminate(false);
                    pDialog.setCancelable(true);
                    pDialog.show();

                    new Thread() {
                        public void run() {
                            String n = name.getText().toString();
                            String p = pwd.getText().toString();
                            String sql = "select ID from user where username='"+n+"' and password='"+p+"'";
                            List<String[]> check = DbAccessManger.getInstance().ExecSql(sql);
                            // 连续数据库
                            if(check.size() == 1)
                            {
                                pDialog.dismiss();
                                Looper.prepare();
                                Toast.makeText(LoginActivity.this, "登录成功", Toast.LENGTH_SHORT).show();
                                Intent i = new Intent(LoginActivity.this,MainActivity.class);
                                i.putExtra("name",n);
                                setResult(100, i);
                                mySharedPreferences= getSharedPreferences("test",
                                        Activity.MODE_PRIVATE);
                                editor = mySharedPreferences.edit();
                                editor.putString("name", n);
                                editor.putString("userid", check.get(0)[0]);
                                editor.commit();
                                finish();
                            }
                            else
                                Toast.makeText(LoginActivity.this, "用户名或密码错误", Toast.LENGTH_LONG).show();
                            Looper.loop();
                        };
                    }.start();

                }
            }
        });
    }
}
