package com.example.inuheart;

import android.app.Activity;
import android.app.Dialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Looper;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.Toolbar;
import android.text.InputType;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ListView;
import android.widget.RelativeLayout;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import dataBaseService.DbAccessManger;

/**
 * Created by Reborn on 2017/7/24.
 */

public class SettingsActivity extends Activity {
    private Button logout;
    private ImageButton back;
    private ListView list;
    private TextView toolbar_title;
    private Toolbar boolBar;
    private SimpleAdapter adapter;
    SharedPreferences mySharedPreferences;
    SharedPreferences.Editor editor;
    private String[] title = new String[]{"绑定手机号","登录密码"};
    private String[] option = new String[]{"设置","修改"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.settings);

        mySharedPreferences= getSharedPreferences("test",Activity.MODE_PRIVATE);
        editor = mySharedPreferences.edit();

        boolBar = (Toolbar)findViewById(R.id.toolbar);
        toolbar_title = (TextView) boolBar.findViewById(R.id.toolbar_title);
        list = (ListView) findViewById(R.id.setting_list);
        logout = (Button)findViewById(R.id.logout);
        back = (ImageButton) findViewById(R.id.back);

        toolbar_title.setText("用户设置");
        adapter = new SimpleAdapter(this,getData(),R.layout.settings_item,
                new String[]{"title","option"},
                new int[]{R.id.title,R.id.option});
        list.setAdapter(adapter);

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(SettingsActivity.this,MainActivity.class);
                i.putExtra("name","请登录~");
                setResult(101, i);
                Toast.makeText(SettingsActivity.this, "退出登录", Toast.LENGTH_SHORT).show();
                editor.clear();
                editor.commit();
                finish();
            }
        });

        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }

    private List<Map<String, Object>> getData(){
        List<Map<String, Object>> list = new ArrayList<Map<String, Object>>();
        for(int i=0;i<title.length;i++){
            Map<String,Object>item = new HashMap<String,Object>();
            item.put("title",title[i]);
            item.put("option",option[i]);
            list.add(item);
        }
        return list;
    }

    public void option_click(View v) {
        RelativeLayout layout = (RelativeLayout) v.getParent();
        final TextView title=(TextView)layout.findViewById(R.id.title);

        LayoutInflater layoutInflater = LayoutInflater.from(this);
        View conView = layoutInflater.inflate(R.layout.settings_dialog, null);
        final EditText text = (EditText) conView.findViewById(R.id.text);
        final EditText text2 = (EditText) conView.findViewById(R.id.text2);
        switch (title.getText().toString()){
            case "绑定手机号":
                text.setInputType(InputType.TYPE_CLASS_NUMBER);
                text.setHint("请输入手机号");
                text2.setVisibility(View.INVISIBLE);
                break;
            case "登录密码" :
                text2.setVisibility(View.VISIBLE);
                text.setHint("请输入新密码");
                text2.setHint("请再次输入密码");
                break;
        }
        AlertDialog dialog = new AlertDialog.Builder(this)
                .setIcon(android.R.drawable.btn_star).setTitle(title.getText().toString())
                .setView(conView)
                .setPositiveButton("确定", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        // TODO Auto-generated method stub
                        switch (title.getText().toString()){
                            case "绑定手机号":
                                if(text.getText().toString().isEmpty())
                                    Toast.makeText(SettingsActivity.this, "请输入手机号",Toast.LENGTH_SHORT).show();
                                else if(text.getText().toString().length() != 11)
                                    Toast.makeText(SettingsActivity.this, "请输入正确的手机号",Toast.LENGTH_SHORT).show();
                                else{   //数据库操作
                                    new Thread()  {
                                        public void run() {
                                            String userid = mySharedPreferences.getString("userid", "");

                                            Log.v("info: ",text.getText().toString() + " " + userid);

                                            String sql = "update user set Phone='"+text.getText().toString()+"' where ID='"+userid+"'";
                                            String check = DbAccessManger.getInstance().ExecNoSelectSql(sql,true);
                                            if(check.isEmpty()){
                                                Looper.prepare();
                                                Toast.makeText(SettingsActivity.this, "手机号绑定成功",Toast.LENGTH_SHORT).show();
                                                Looper.loop();
                                            }
                                            else{
                                                Looper.prepare();
                                                Toast.makeText(SettingsActivity.this, "出错了！", Toast.LENGTH_LONG).show();
                                                Looper.loop();
                                            }
                                        };
                                    }.start();
                                }
                                break;
                            case "登录密码" :
                                if(text.getText().toString().isEmpty() || text2.getText().toString().isEmpty())
                                    Toast.makeText(SettingsActivity.this, "请输入密码",Toast.LENGTH_SHORT).show();
                                if(!text.getText().toString().equals(text2.getText().toString()))
//                                    Log.v("info: ",text.getText().toString() + " " + text2.getText().toString());
                                    Toast.makeText(SettingsActivity.this, "请确保两次输入的密码一致",Toast.LENGTH_SHORT).show();
                                else{   //数据库操作
                                    new Thread()  {
                                        public void run() {
                                            String userid = mySharedPreferences.getString("userid", "");

                                            Log.v("info: ",text.getText().toString() + " " + userid);

                                            String sql = "update user set Password='"+text.getText().toString()+"' where ID='"+userid+"'";
                                            String check = DbAccessManger.getInstance().ExecNoSelectSql(sql,true);
                                            if(check.isEmpty()){
                                                Looper.prepare();
                                                Toast.makeText(SettingsActivity.this, "登录密码修改成功",Toast.LENGTH_SHORT).show();
                                                Looper.loop();
                                            }
                                            else{
                                                Looper.prepare();
                                                Toast.makeText(SettingsActivity.this, "出错了！", Toast.LENGTH_LONG).show();
                                                Looper.loop();
                                            }
                                        };
                                    }.start();
                                }
                                break;
                        }
                    }
                }).setNegativeButton("取消", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        // TODO Auto-generated method stub
                        Toast.makeText(SettingsActivity.this, "取消",
                                Toast.LENGTH_SHORT).show();
                    }
                }).create();
        dialog.show();

    }
}