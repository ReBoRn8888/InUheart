package com.example.inuheart;


import android.app.Activity;
import android.app.DatePickerDialog;
import android.app.ProgressDialog;
import android.app.TimePickerDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Looper;
import android.support.v4.app.Fragment;
import android.support.v7.app.AlertDialog;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.TimePicker;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.HashMap;
import java.util.List;

import dataBaseService.DbAccessManger;

public class MyFragment extends Fragment implements View.OnClickListener{

	private View view;
	private Button online_button,time_button,teacher_button,anonymous,consult;
	private EditText date_text,time_text;
	private ProgressDialog pDialog;
	private String userid;
	private SharedPreferences sharedPreferences;
	private SharedPreferences.Editor editor;
	private int yourChoice;
	private String[] items;
	private SimpleAdapter adapter;
	private ArrayList<HashMap<String, Object>> InfList = new ArrayList<HashMap<String, Object>>();
	private ListView list;
	private TextView hint;

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
			Bundle savedInstanceState) {
		String judge = getArguments().getString("param");
		sharedPreferences= getActivity().getSharedPreferences("test",
				Activity.MODE_PRIVATE);
		editor = sharedPreferences.edit();

		switch (judge)
		{
			case "预约咨询":
				view = inflater.inflate(R.layout.appointment_main, container,false);
				online_button = (Button)view.findViewById(R.id.online_button);
				time_button = (Button)view.findViewById(R.id.time_button);
				teacher_button = (Button)view.findViewById(R.id.teacher_button);
				date_text = (EditText)view.findViewById(R.id.date_text);
				time_text = (EditText)view.findViewById(R.id.time_text);

				teacher_button.setOnClickListener(new View.OnClickListener() {
					@Override
					public void onClick(View view) {
						userid = sharedPreferences.getString("userid", "");
						if (userid.isEmpty()) Toast.makeText(getActivity(), "请先登录~", Toast.LENGTH_SHORT).show();
						else {
							pDialog = new ProgressDialog(getActivity());
							pDialog.setMessage("加载中……");
							pDialog.setIndeterminate(false);
							pDialog.setCancelable(true);
							pDialog.show();
							new Thread() {
								public void run() {
									Looper.prepare();
									String sql = "select teacher from appointment";
									List<String[]> check = DbAccessManger.getInstance().ExecSql(sql);
									pDialog.dismiss();
									if (check.size() > 0) {
										items = new String[check.size()];
										for (int i = 0; i < check.size(); i++)
											items[i] = check.get(i)[0];
										yourChoice = 0;
										AlertDialog.Builder singleChoiceDialog = new AlertDialog.Builder(getActivity());
										singleChoiceDialog.setTitle("请选择心理咨询师：");
										// 第二个参数是默认选项，此处设置为0
										singleChoiceDialog.setSingleChoiceItems(items, 0, new DialogInterface.OnClickListener() {
											@Override
											public void onClick(DialogInterface dialog, int which) {
												yourChoice = which;
											}
										});
										singleChoiceDialog.setPositiveButton("确定", new DialogInterface.OnClickListener() {
											@Override
											public void onClick(DialogInterface dialog, int which) {
												if (yourChoice != -1) {
													Toast.makeText(getActivity(), "你选择了" + items[yourChoice], Toast.LENGTH_SHORT).show();
													Bundle b = new Bundle();
													b.putString("teacher", items[yourChoice]);
													b.putString("judge", "按心理咨询师预约");
													Intent intent = new Intent(getActivity(), AppointActivity.class);
													intent.putExtras(b);
													startActivity(intent);
												}
											}
										});
										singleChoiceDialog.show();
									} else {
//									Looper.prepare();
										Toast.makeText(getActivity(), "抱歉，未搜索到相关心理咨询师信息", Toast.LENGTH_SHORT).show();
									}
									Looper.loop();
								}
							}.start();
						}
					}
				});

				time_button.setOnClickListener(new View.OnClickListener() {
					@Override
					public void onClick(View v) {
						userid = sharedPreferences.getString("userid", "");
						if (userid.isEmpty())
							Toast.makeText(getActivity(), "请先登录~", Toast.LENGTH_SHORT).show();
						else {
							Calendar c = Calendar.getInstance();
							// 直接创建一个DatePickerDialog对话框实例，并将它显示出来
							new DatePickerDialog(getActivity(),
									// 绑定监听器
									new DatePickerDialog.OnDateSetListener() {

										@Override
										public void onDateSet(DatePicker view, int year,
															  int monthOfYear, int dayOfMonth) {
											Bundle b = new Bundle();
											String y = String.valueOf(year);
											String m = String.valueOf(monthOfYear + 1);
											String d = String.valueOf(dayOfMonth);
											if (y.length() == 1) y = "0" + y;
											if (m.length() == 1) m = "0" + m;
											if (d.length() == 1) d = "0" + d;
											b.putString("judge", "按时间预约");
											b.putString("date", y + "-" + m + "-" + d);
											Log.v("date", y + "-" + m + "-" + d);
											Intent intent = new Intent(getActivity(), AppointActivity.class);
											intent.putExtras(b);
											startActivity(intent);
										}
									}
									// 设置初始日期
									, c.get(Calendar.YEAR), c.get(Calendar.MONTH), c
									.get(Calendar.DAY_OF_MONTH)).show();
						}
					}
				});

				date_text.setOnClickListener(new View.OnClickListener() {
					@Override
					public void onClick(View v) {
						Calendar c = Calendar.getInstance();
						// 直接创建一个DatePickerDialog对话框实例，并将它显示出来
						new DatePickerDialog(getActivity(),
								// 绑定监听器
								new DatePickerDialog.OnDateSetListener() {

									@Override
									public void onDateSet(DatePicker view, int year,
														  int monthOfYear, int dayOfMonth) {
										String y = String.valueOf(year);
										String m = String.valueOf(monthOfYear + 1);
										String d = String.valueOf(dayOfMonth);
										if (y.length() == 1) y = "0" + y;
										if (m.length() == 1) m = "0" + m;
										if (d.length() == 1) d = "0" + d;
										date_text.setText(y + "-" + m + "-" + d);
									}
								}
								// 设置初始日期
								, c.get(Calendar.YEAR), c.get(Calendar.MONTH), c
								.get(Calendar.DAY_OF_MONTH)).show();
					}
				});

				time_text.setOnClickListener(new View.OnClickListener() {
					@Override
					public void onClick(View v) {
						Calendar c = Calendar.getInstance();
						// 创建一个TimePickerDialog实例，并把它显示出来
						new TimePickerDialog(getActivity(),
								// 绑定监听器
								new TimePickerDialog.OnTimeSetListener() {

									@Override
									public void onTimeSet(TimePicker view,
														  int hourOfDay, int minute) {
										String h = String.valueOf(hourOfDay);
										String m = String.valueOf(minute);
										if (h.length() == 1) h = "0" + h;
										if (m.length() == 1) m = "0" + m;
										time_text.setText(h + ":" + m);
									}
								}
								// 设置初始时间
								, c.get(Calendar.HOUR_OF_DAY), c.get(Calendar.MINUTE),
								// true表示采用24小时制
								true).show();
					}
				});

				online_button.setOnClickListener(new View.OnClickListener() {
					@Override
					public void onClick(View v) {
						userid = sharedPreferences.getString("userid", "");
						if(userid.isEmpty())
							Toast.makeText(getActivity(), "请先登录~", Toast.LENGTH_SHORT).show();
						else {
							if(date_text.getText().toString().isEmpty()||time_text.getText().toString().isEmpty())
								Toast.makeText(getActivity(), "请选择时间", Toast.LENGTH_SHORT).show();
							else
							{
								pDialog = new ProgressDialog(getActivity());
								pDialog.setMessage("预约中……");
								pDialog.setIndeterminate(false);
								pDialog.setCancelable(true);
								pDialog.show();
								new Thread() {
									public void run() {
										String d = date_text.getText().toString();
										String t = time_text.getText().toString();
										String sql = "select * from online_appoint where Date='"+d+"' and Time='"+t+"'";
										List<String[]> check = DbAccessManger.getInstance().ExecSql(sql);
										// 连续数据库
										Looper.prepare();
										pDialog.dismiss();
										if(check.size() == 1)
											Toast.makeText(getActivity(), "您已经有这个时间段的预约了~", Toast.LENGTH_SHORT).show();
										else{
											String sql2 = "insert into online_appoint(User,Date,Time) values('"+Integer.parseInt(userid)+"','"+d+"','"+t+"')";
											String check2 = DbAccessManger.getInstance().ExecNoSelectSql(sql2,true);
											if(check2.isEmpty())
												Toast.makeText(getActivity(), "预约成功", Toast.LENGTH_SHORT).show();
											else
												Toast.makeText(getActivity(), "预约失败", Toast.LENGTH_SHORT).show();
										}
										Looper.loop();
									};
								}.start();
							}
						}
					}
				});
				break;
			case "心理测评":
				view = inflater.inflate(R.layout.test_main, container,false);
				break;
			case "在线聊天":
				view = inflater.inflate(R.layout.chat_main, container,false);
				anonymous = (Button)view.findViewById(R.id.anonymous);
				consult = (Button)view.findViewById(R.id.consult);

				anonymous.setOnClickListener(new View.OnClickListener() {
					@Override
					public void onClick(View view) {
						if(sharedPreferences.getString("name","").isEmpty())
							Toast.makeText(getActivity(), "请先登录~", Toast.LENGTH_SHORT).show();
						else{
							Bundle b = new Bundle();
							b.putString("judge", "多人匿名聊天室");
							Toast.makeText(getActivity(), "多人匿名聊天室", Toast.LENGTH_SHORT).show();
							Intent intent = new Intent(getActivity(), ChatActivity.class);
							intent.putExtras(b);
							startActivity(intent);
						}
					}
				});

				consult.setOnClickListener(new View.OnClickListener() {
					@Override
					public void onClick(View view) {
						if(sharedPreferences.getString("name","").isEmpty())
							Toast.makeText(getActivity(), "请先登录~", Toast.LENGTH_SHORT).show();
						else{
							Bundle b = new Bundle();
							b.putString("judge", "在线咨询室");
							Toast.makeText(getActivity(), "在线咨询室", Toast.LENGTH_SHORT).show();
							Intent intent = new Intent(getActivity(), ChatActivity.class);
							intent.putExtras(b);
							startActivity(intent);
						}
					}
				});
				break;
			case "线下预约":
				view = inflater.inflate(R.layout.plain_list, container,false);
				list = (ListView)view.findViewById(R.id.list);
				hint = (TextView)view.findViewById(R.id.hint);
                hint.setVisibility(View.GONE);
//                pDialog = new ProgressDialog(getActivity());
//				pDialog.setMessage("加载中……");
//				pDialog.setIndeterminate(false);
//				pDialog.setCancelable(true);
//				pDialog.show();
				try {
					Thread.sleep(300);
				} catch (InterruptedException e) {
				}
				new Thread() {
					public void run() {
						String userid = sharedPreferences.getString("userid", "");
						String sql = "select teacher,room,time,date,Information,Accept,Complete,UserID,AppointID from appointment,appoint_result where appoint_result.AppointID=appointment.ID and UserID='"+userid+"' order by date,time";
						List<String[]> check = DbAccessManger.getInstance().ExecSql(sql);
//						pDialog.dismiss();
						int i = check.size();
						Log.v("info","i_origin=" + i);
                        if(i > 0){
                            while(i > 0)
                            {
                                getActivity().runOnUiThread(new Runnable() {
                                    public void run() {
                                        adapter = new SimpleAdapter(getActivity(),
                                                InfList,
                                                R.layout.appoint_result_offline,
                                                new String[]{"teacher", "date", "time", "room", "info", "accept", "complete", "userid", "appointid"},
                                                new int[]{R.id.teacher,R.id.date,R.id.time,R.id.room,R.id.info,R.id.accept,R.id.complete,R.id.userid,R.id.appointid});
                                        list.setAdapter(adapter);
                                    }
                                });
                                HashMap<String, Object> map = new HashMap<String, Object>();
                                map.put("teacher", check.get(i - 1)[0]);
                                map.put("date", check.get(i - 1)[3]);
                                map.put("time", check.get(i - 1)[2]);
                                map.put("room", check.get(i - 1)[1]);
                                map.put("info", check.get(i - 1)[4]);
                                if(check.get(i - 1)[5].equals("0")) map.put("accept", "否");
                                else map.put("accept", "是");
                                if(check.get(i - 1)[6].equals("0")) map.put("complete", "否");
                                else map.put("complete", "是");
                                map.put("userid", check.get(i - 1)[7]);
                                map.put("appointid", check.get(i - 1)[8]);
                                Log.v("info",check.get(i - 1)[0] + " " + check.get(i - 1)[1] + " " + check.get(i - 1)[2] + " " + check.get(i - 1)[3] + " " + check.get(i - 1)[4] + " " + check.get(i - 1)[5] + " " + check.get(i - 1)[6]);
                                InfList.add(map);
                                i--;
                            }
                        }
						else{
                            getActivity().runOnUiThread(new Runnable() {
                                public void run() {
                                    hint.setVisibility(View.VISIBLE);
                                    list.setVisibility(View.GONE);
                                }
                            });
//                            Looper.prepare();
//							Toast.makeText(getActivity(), "您没有进行任何预约", Toast.LENGTH_SHORT).show();
//							Looper.loop();
						}
					}
				}.start();

				break;
			case "线上预约":
				view = inflater.inflate(R.layout.plain_list, container,false);
				list = (ListView)view.findViewById(R.id.list);
                hint = (TextView)view.findViewById(R.id.hint);
                hint.setVisibility(View.GONE);
//				pDialog = new ProgressDialog(getActivity());
//				pDialog.setMessage("加载中……");
//				pDialog.setIndeterminate(false);
//				pDialog.setCancelable(true);
//				pDialog.show();
//				try {
//					Thread.sleep(300);
//				} catch (InterruptedException e) {
//				}
				new Thread() {
					public void run() {
						String userid = sharedPreferences.getString("userid", "");
						String sql2 = "select Date,Time,Accept,Complete,ID from online_appoint where User='"+userid+"' order by Date,Time";
						List<String[]> check2 = DbAccessManger.getInstance().ExecSql(sql2);
//						pDialog.dismiss();
						int j = check2.size();
						Log.v("info","i_origin=" + j);
                        if(j > 0){
                            while(j > 0)
                            {
                                getActivity().runOnUiThread(new Runnable() {
                                    public void run() {
                                        adapter = new SimpleAdapter(getActivity(),
                                                InfList,
                                                R.layout.appoint_result_online,
                                                new String[]{"date", "time", "accept", "complete", "appointid"},
                                                new int[]{R.id.date,R.id.time,R.id.accept,R.id.complete,R.id.appointid});
                                        list.setAdapter(adapter);
                                    }
                                });
                                HashMap<String, Object> map = new HashMap<String, Object>();
                                map.put("date", check2.get(j - 1)[0]);
                                map.put("time", check2.get(j - 1)[1]);
                                if(check2.get(j - 1)[2].equals("0")) map.put("accept", "否");
                                else map.put("accept", "是");
                                if(check2.get(j - 1)[3].equals("0")) map.put("complete", "否");
                                else map.put("complete", "是");
                                map.put("appointid", check2.get(j - 1)[4]);
                                Log.v("info",check2.get(j - 1)[0] + " " + check2.get(j - 1)[1] + " " + check2.get(j - 1)[2] + " " + check2.get(j - 1)[3] + " " + check2.get(j - 1)[4]);
                                InfList.add(map);
                                j--;
                            }
                        }
						else{
                            getActivity().runOnUiThread(new Runnable() {
                                public void run() {
                                    hint.setVisibility(View.VISIBLE);
                                    list.setVisibility(View.GONE);
                                }
                            });
//                            Looper.prepare();
//							Toast.makeText(getActivity(), "您没有进行任何预约", Toast.LENGTH_SHORT).show();
//							Looper.loop();
						}
					}
				}.start();
				break;
		}
		return view;
	}

	public void loadteacher(){

	}
	@Override
	public void onClick(View view) {
//		switch(view.getId())
//		{
//
//		}
	}
}
